<?php

namespace App\Jobs;

use App\EntitySport;
use App\Models\Player;
use App\Models\Squad;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Team;

class GetTeam implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $season_id;
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
    public function __construct()
    {
        $this->queue = 'squad';
        //$this->season_id = $season_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $api = new EntitySport();
        $getSeason=$api->getLeagueSeason("Premier League");
        foreach($getSeason as $seasonValue){
            if($seasonValue['current_season_id']){
                $teams = $api->getTeam($seasonValue['current_season_id']);
                $setCountry = '';
                foreach ($teams as $teamData) {
                    $teamQuery = Team::query()->updateOrCreate([
                        'id' => $teamData['id'],
                    ], [
                        'name' => $teamData['name'],
                        'legacy_id' => $teamData['legacy_id'],
                        'short_code' => $teamData['short_code'],
                        'twitter' => $teamData['twitter'],
                        'country_id' => $teamData['country_id'],
                        'national_team' => $teamData['national_team'],
                        'founded' => $teamData['founded'],
                        'logo_path' => $teamData['logo_path'],
                        'venue_id' => $teamData['venue_id'],
                        'current_season_id' => $teamData['current_season_id'],
                        'is_placeholder' => $teamData['is_placeholder'],
                    ]);
                }
            }
        }
    }
}
