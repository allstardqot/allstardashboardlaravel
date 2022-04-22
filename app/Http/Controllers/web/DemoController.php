<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\League;
use App\Models\Player;
use App\EntitySport;
use App\Models\Fixture;
use App\Models\Season;
use App\Models\Team;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class DemoController extends Controller
{
    // get country data
    public function countryData(){
        $response = Http::get('https://soccer.sportmonks.com/api/v2.0/countries?api_token=d4yUkubCa17GvW17MXtNjAhYokiXlNQeRnYhLscpMa1zfH8JkS2b42plhu6X');
        $responseArr=json_decode($response,true);
        if($responseArr['data']){
            //$query=Country::
            foreach($responseArr['data'] as $value){
                if($value['extra']){
                    unset($value['extra']['flag']);
                }
                $insertData[]=array('id'=>$value['id'],'name'=>$value['name'],'image_path'=>$value['image_path'],'extra'=>json_encode($value['extra']));
                //pr($value);
            }
            if(!empty($insertData)){
                if(Country::insert($insertData)){
                    echo "data saved";
                }

            }
        }
    }

    // get season data
    public function seasonData(){
        $response = Http::get('https://soccer.sportmonks.com/api/v2.0/seasons?api_token=d4yUkubCa17GvW17MXtNjAhYokiXlNQeRnYhLscpMa1zfH8JkS2b42plhu6X');
        $responseArr=json_decode($response,true);
        if($responseArr['data']){
            foreach($responseArr['data'] as $value){
                $insertData[]=array('id'=>$value['id'],'name'=>$value['name'],'league_id'=>$value['league_id'],'is_current_season'=>$value['is_current_season'],'current_round_id'=>$value['current_round_id'],'current_stage_id'=>$value['current_stage_id']);
            }
            if(!empty($insertData)){
                if(Season::insert($insertData)){
                    echo "data saved";
                }
            }
        }
    }

    // get league data
    public function leagueData(){
        $response = Http::get('https://soccer.sportmonks.com/api/v2.0/leagues?api_token=d4yUkubCa17GvW17MXtNjAhYokiXlNQeRnYhLscpMa1zfH8JkS2b42plhu6X');
        $responseArr=json_decode($response,true);
        //pr($responseArr);
        if($responseArr['data']){
            foreach($responseArr['data'] as $value){
                $insertData[]=array('id'=>$value['id'],'name'=>$value['name'],'active'=>$value['active'],'type'=>$value['type'],'legacy_id'=>$value['legacy_id'],'country_id'=>$value['country_id'],'logo_path'=>$value['logo_path'],'is_cup'=>$value['is_cup'],'is_friendly'=>$value['is_friendly'],'current_season_id'=>$value['current_season_id'],'current_round_id'=>$value['current_round_id'],'current_stage_id'=>$value['current_stage_id'],'live_standings'=>$value['live_standings'],'coverage'=>json_encode($value['coverage']));
            }
            if(!empty($insertData)){
                if(League::insert($insertData)){
                    echo "data saved";
                }
            }
        }
    }
    //fixture data
    public function fixtureData(){

        $api = new EntitySport();
        $team=Team::select('current_season_id')->get()->toArray();
        if(in_array("18366",$team)){
            p("fineee");
        }
        pr($team);
        $getSeason=$api->getLeagueSeason("Premier League");
        foreach($getSeason as $seasonValue){
            pr($seasonValue);
        }
        pr($getSeason);

        $fixtures = $api->getFixture(now()->toDateString() .'/' . now()->addDays(5)->toDateString());
        //$fixtures=json_decode($fixtures_data,true);
        $setSeasonId='';
        foreach($fixtures as $value){
            //pr($value);
            //pr($value['time']['starting_at']['date_time']);
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
                if(!Season::find($value['season_id'])){
                    $season = $api->getSeason($value['season_id']);
                    $competition = Season::query()->updateOrCreate([
                        'id' => $value['season_id'],
                    ], [
                        'name' => $season['name'],
                        'league_id' => $season['league_id'],
                        'is_current_season' => $season['is_current_season'],
                        'current_round_id' => $season['current_round_id'],
                        'current_stage_id' => $season['current_stage_id'],
                    ]);
                }

                if(!League::find($value['league_id'])){
                    $league = $api->getLeague($value['league_id']);
                    $leagueQuery = League::query()->updateOrCreate([
                        'id' => $value['league_id'],
                    ], [
                        'name' => $league['name'],
                        'active' => $league['active'],
                        'type' => $league['type'],
                        'legacy_id' => $league['legacy_id'],
                        'country_id' => $league['country_id'],
                        'is_cup' => $league['is_cup'],
                        'logo_path' => $league['logo_path'],
                        'is_friendly' => $league['is_friendly'],
                        'current_season_id' => $league['current_season_id'],
                        'current_round_id' => $league['current_round_id'],
                        'current_stage_id' => $league['current_stage_id'],
                        'live_standings' => $league['live_standings'],
                        'coverage' => json_encode($league['coverage']),

                    ]);
                }

                if($setSeasonId=='' || $setSeasonId!=$value['season_id']){
                    $teams = $api->getTeam($value['season_id']);
                    $setCountry='';
                    foreach($teams as $teamData){
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

                        if($setCountry=='' || $setCountry!=$teamData['country_id'])
                        $players = $api->getPlayer($teamData['country_id'].'/players');
                        foreach($players as $playerData){
                            if($playerData['birthdate']){
                                $convert=str_replace("/","-",$playerData['birthdate']);
                                $date=date_create($convert);
                                $playerData['birthdate']=date_format($date,"Y/m/d H:i:s");
                            }
                            $date=date_create("16-01-1988");
                            $playerQuery = Player::query()->updateOrCreate([
                                'id' => $playerData['player_id'],
                            ], [
                                'team_id' => $playerData['team_id'],
                                'country_id' => $playerData['country_id'],
                                'position_id' => $playerData['position_id'],
                                'common_name' => $playerData['common_name'],
                                'display_name' => $playerData['display_name'],
                                'fullname' => $playerData['fullname'],
                                'firstname' => $playerData['firstname'],
                                'lastname' => $playerData['lastname'],
                                'nationality' => $playerData['nationality'],
                                'birthdate' => $playerData['birthdate'],
                                'birthcountry' => $playerData['birthcountry'],
                                'birthplace' => $playerData['birthplace'],
                                'height' => $playerData['height'],
                                'weight' => $playerData['weight'],
                                'image_path' => $playerData['image_path'],
                            ]);
                        }
                        $setCountry=$teamData['country_id'];
                    }
                    $setSeasonId=$value['season_id'];
                }
            }
        }
    }
}
