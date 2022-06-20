<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Team;
use App\EntitySport;
use App\Models\Fixture;
use App\Models\League;
use Carbon\Carbon;
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
        //Getlineup::dispatch('18138818');
        Log::info("fixture runningghhhhhhhhhhhh");
        $api = new EntitySport();

        $fixtures = $api->getFixture(now()->toDateString() .'/' . now()->addDays(5)->toDateString().'?leagues=779&include=news,localTeam,visitorTeam');
        //$fixtures=json_decode($fixtures_data,true);
        //Log::info("6666666666666e".json_encode($fixtures)."pppp");

        $setSeasonId='';
        foreach($fixtures as $value){
                // if($value['season_id']!='18378'){
                //     continue;
                // }
                // if($value['league_id']!='1538'){
                //     continue;
                // }
                if($value['league_id']!='779'){
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
                    'starting_at' => $value['time']['starting_at']['date_time'],
                    'status' => $value['time']['status']
                ]);

                if($fixtureQuery->wasRecentlyCreated){
                        $localteamdData=$value['localTeam']['data'];
                        if(!empty($localteamdData)){
                        $teamQuery = Team::query()->updateOrCreate([
                            'id' => $localteamdData['id'],
                        ], [
                            'name' => $localteamdData['name'],
                            'legacy_id' => $localteamdData['legacy_id'],
                            'short_code' => $localteamdData['short_code'],
                            'twitter' => $localteamdData['twitter'],
                            'country_id' => $localteamdData['country_id'],
                            'national_team' => $localteamdData['national_team'],
                            'founded' => $localteamdData['founded'],
                            'logo_path' => $localteamdData['logo_path'],
                            'venue_id' => $localteamdData['venue_id'],
                            'current_season_id' => $localteamdData['current_season_id'],
                            'is_placeholder' => $localteamdData['is_placeholder'],
                        ]);
                        }

                        $visitorTeamData=$value['visitorTeam']['data'];
                        if(!empty($visitorTeamData)){
                            $teamQuery = Team::query()->updateOrCreate([
                                'id' => $visitorTeamData['id'],
                            ], [
                                'name' => $visitorTeamData['name'],
                                'legacy_id' => $visitorTeamData['legacy_id'],
                                'short_code' => $visitorTeamData['short_code'],
                                'twitter' => $visitorTeamData['twitter'],
                                'country_id' => $visitorTeamData['country_id'],
                                'national_team' => $visitorTeamData['national_team'],
                                'founded' => $visitorTeamData['founded'],
                                'logo_path' => $visitorTeamData['logo_path'],
                                'venue_id' => $visitorTeamData['venue_id'],
                                'current_season_id' => $visitorTeamData['current_season_id'],
                                'is_placeholder' => $visitorTeamData['is_placeholder'],
                            ]);
                        }
                        Log::info("fixture id get".$value['id']);

                        GetSquad::dispatch($value['id']);
                        $lineupSchedule = Carbon::parse($fixtureQuery->starting_at)->addMinutes(-45);
                        Log::info($lineupSchedule);
                        Getlineup::dispatch($value['id'])->delay($lineupSchedule);
                        GetScore::dispatch($value['id'])->delay(Carbon::parse($fixtureQuery->starting_at)->addMinute(1));
                        //Getlineup::dispatch($value['id']);


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
                }else{
                Log::info("nnnnnnnnnnnnn");

                }
        }
    }
}
