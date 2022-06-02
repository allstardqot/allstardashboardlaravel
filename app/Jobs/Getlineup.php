<?php

namespace App\Jobs;

use App\EntitySport;
use App\Models\Squad;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class Getlineup implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $fixtureId;
    private bool $autoSet;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */

    /**
     * Create a new job instance.
     *
     * @param $fixtureId
     * @param bool $autoSet
     */
    public function __construct($fixtureId,$autoSet=true)
    {
        $this->queue = 'lineup';
        $this->autoSet=$autoSet;
        $this->fixtureId = $fixtureId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $api = new EntitySport();
        $getLineup = $api->getLineup($this->fixtureId.'?include=lineup');
        log::info("lineup running".$this->fixtureId);
        log::info("lineup runningfff".json_encode($getLineup));

        if(!empty($getLineup['lineup']['data'])){
            Log::info("lineup announced.".$this->fixtureId);

            foreach($getLineup['lineup']['data'] as $lineupValue){
                $squadData=Squad::where([['player_id',$lineupValue['player_id']],['fixture_id',$lineupValue['fixture_id']],['team_id',$lineupValue['team_id']]])->first();
                $squadData->playing11=1;
                if($squadData->update()){
                }
            }
        }
        if ($this->autoSet) {
            Log::info("lineup Schedule".$this->fixtureId);
            self::dispatch($this->fixtureId)->delay(now()->addMinutes(1));
        }
    }
}
