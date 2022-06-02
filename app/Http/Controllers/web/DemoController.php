<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\League;
use App\Models\Player;
use App\EntitySport;
use App\Models\Fixture;
use App\Models\News;
use App\Models\Season;
use App\Models\Squad;
use App\Models\Team;
use App\Models\UserTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


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
    public function teamData(){
        $api = new EntitySport();
        $getSeason=$api->team("season/19376");
        //prr($getSeason);
        foreach($getSeason as $teamData){
            // if(!League::find($seasonValue['id'])){
            //     $leagueQuery = League::query()->updateOrCreate([
            //         'id' => $seasonValue['id'],
            //     ], [
            //         'name' => $seasonValue['name'],
            //         'active' => $seasonValue['active'],
            //         'type' => $seasonValue['type'],
            //         'legacy_id' => $seasonValue['legacy_id'],
            //         'country_id' => $seasonValue['country_id'],
            //         'is_cup' => $seasonValue['is_cup'],
            //         'logo_path' => $seasonValue['logo_path'],
            //         'is_friendly' => $seasonValue['is_friendly'],
            //         'current_season_id' => $seasonValue['current_season_id'],
            //         'current_round_id' => $seasonValue['current_round_id'],
            //         'current_stage_id' => $seasonValue['current_stage_id'],
            //         'live_standings' => $seasonValue['live_standings'],
            //         'coverage' => json_encode($seasonValue['coverage']),

            //     ]);
            // }
            // if(!empty($seasonValue['current_season_id']) && $seasonValue['current_season_id']=='18378'){
            // if(!empty($seasonValue['current_season_id'])){
            //     $teams = $api->getTeam($seasonValue['current_season_id']);
            //     $setCountry = '';
            //     foreach ($teams as $teamData) {
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
            //     }
            // }
        }
    }
    //fixture data
    public function fixtureData(){

        log::info("fixture runningghhhhhhhhhhhh");
        $api = new EntitySport();

        $fixtures = $api->getFixture(now()->toDateString() .'/' . now()->addDays(30)->toDateString().'?include=news');
        //$fixtures=json_decode($fixtures_data,true);
        log::info("6666666666666");
//        prr($fixtures);
        $setSeasonId='';
        foreach($fixtures as $value){
                // if($value['season_id']!='18378'){
                //     continue;
                // }
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
                log::info("fffffffffffff");

                if($fixtureQuery->wasRecentlyCreated){
                        log::info("lllkkkkkkkk");
                        //GetTeam::dispatch();
                        GetSquad::dispatch($value['id']);
                        $lineupSchedule = Carbon::parse($fixtureQuery->starting_at)->addMinutes(-45);
                        log::info($lineupSchedule);
                        Getlineup::dispatch($fixtureQuery->id)->delay($lineupSchedule);
                        GetScore::dispatch($fixtureQuery->id)->delay(Carbon::parse($fixtureQuery->starting_at)->addMinute(1));
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
                log::info("nnnnnnnnnnnnn");

                }
        }
    }

    public function setusertotalteam(){

        $this->fixtureId=18138829;
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
        echo "fine";

        // foreach($squads as $total_points=>$player_id){

        // }
    }
}
