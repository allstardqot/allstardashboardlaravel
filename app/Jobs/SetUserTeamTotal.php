<?php

namespace App\Jobs;

use App\EntitySport;
use App\Models\Fixture;
use App\Models\Squad;
use App\Models\UserTeam;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SetUserTeamTotal implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 600;

    private $fixtureId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($fixtureId)
    {
        $this->fixtureId = $fixtureId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $fixture = Fixture::query()
                    ->where('id', $this->fixtureId)
                    ->first();

        $week=weekIdDate($fixture->starting_at);
        if($week>0){
            $squads=Squad::where([['fixture_id',$this->fixtureId],['total_points','>',0]])->pluck('total_points','player_id')->toArray();

            $user_team=UserTeam::where('week',3)->get();

            foreach($user_team as $key=>$userValue){
                $total_points=0;
                $selected_player=json_decode($userValue->players,true);
                $substitude_player=json_decode($userValue->substitude,true);
                $played_player=array_diff($selected_player,$substitude_player);
                foreach($played_player as $player_id){
                    if($userValue->captain==$player_id){
                        $total_points += isset($squads[$player_id])?$squads[$player_id]*2:0;
                    }else{
                        $total_points += isset($squads[$player_id])?$squads[$player_id]:0;
                    }
                }
                $userValue->total_points=$total_points;
                $userValue->update();
            }
        }
    }
}
