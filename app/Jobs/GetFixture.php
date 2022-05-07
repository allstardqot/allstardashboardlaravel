<?php

namespace App\Jobs;

use App\EntitySport;
use App\Models\Fixture;
use Illuminate\Bus\Queueable;
use App\Models\League;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Season;
use Illuminate\Support\Facades\Log;

class GetFixture implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 300;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->queue = 'fixture';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        log::info("fixture running");
        $api = new EntitySport();

        $fixtures = $api->getFixture(now()->toDateString() .'/' . now()->addDays(5)->toDateString().'?include=news');
        //$fixtures=json_decode($fixtures_data,true);
        $setSeasonId='';
        foreach($fixtures as $value){
                if($value['season_id']!='18378'){
                    continue;
                }
                $fixtureQuery = Fixture::query()->updateOrCreate([
                    'id' => $value['id'],
                ], [
                    'season_id' => $value['season_id'],
                    'league_id' => $value['league_id'],
                    'stage_id' => $value['stage_id'],
                    'round_id' => $value['round_id'],
                    'group_id' => $value['group_id'],
                    'aggregate_id' => $value['aggregate_id'],
                    'venue_id' => $value['venue_id'],
                    'referee_id' => $value['referee_id'],
                    'localteam_id' => $value['localteam_id'],
                    'visitorteam_id' => $value['visitorteam_id'],
                    'weather_report' => is_array($value['weather_report'])?json_encode($value['weather_report']):'',
                    'scores' => is_array($value['scores'])?json_encode($value['scores']):'',
                    'starting_at' => $value['time']['starting_at']['date_time']
                ]);
                if($fixtureQuery->wasRecentlyCreated){
                        GetTeam::dispatch();
                        GetSquad::dispatch($value['id']);

                    // if(!Season::find($value['season_id'])){
                    //     $seasonData = $api->getSeason('');
                    //     foreach ($seasonData as $season) {
                    //         $competition = Season::query()->updateOrCreate([
                    //             'id' => $season['id'],
                    //         ], [
                    //             'name' => $season['name'],
                    //             'league_id' => $season['league_id'],
                    //             'is_current_season' => $season['is_current_season'],
                    //             'current_round_id' => $season['current_round_id'],
                    //             'current_stage_id' => $season['current_stage_id'],
                    //         ]);
                    //     }
                    // }

                    // if(!League::find($value['league_id'])){
                    //     $leagueData = $api->getLeague('');
                    //     foreach ($leagueData as $league) {
                    //         $leagueQuery = League::query()->updateOrCreate([
                    //             'id' => $league['id'],
                    //         ], [
                    //             'name' => $league['name'],
                    //             'active' => $league['active'],
                    //             'type' => $league['type'],
                    //             'legacy_id' => $league['legacy_id'],
                    //             'country_id' => $league['country_id'],
                    //             'is_cup' => $league['is_cup'],
                    //             'logo_path' => $league['logo_path'],
                    //             'is_friendly' => $league['is_friendly'],
                    //             'current_season_id' => $league['current_season_id'],
                    //             'current_round_id' => $league['current_round_id'],
                    //             'current_stage_id' => $league['current_stage_id'],
                    //             'live_standings' => $league['live_standings'],
                    //             'coverage' => json_encode($league['coverage']),

                    //         ]);
                    //     }
                    // }
                }
        }
    }
}
