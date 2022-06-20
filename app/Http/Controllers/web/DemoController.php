<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Player;

use App\Models\League;

use App\EntitySport;
use App\Models\Fixture;
use App\Models\Payment;
use App\Models\News;
use App\Models\Season;
use App\Models\Squad;
use App\Models\Team;
use App\Models\User;
use App\Models\UserTeam;
use App\Models\UserContest;
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

    public function rankUpdate(){
        //echo priviousWeek();die;
        // $userContestQuery=UserContest::join('user_teams as ut','ut.id','user_contests.user_team_id')->select(['ut.total_points','user_contests.pool_id','user_contests.rank','user_contests.id'])->orderBy('pool_id','asc')->orderBy('total_points','desc')->get();
        // $rank=$pool_id=$total_points=0;
        // //prr($userContestQuery);
        // foreach($userContestQuery as $key=>$value){
        //     if($pool_id==0 || $pool_id!=$value['pool_id']){
        //         $rank=0;
        //     }

        //     if($pool_id==$value['pool_id'] && $total_points==$value['total_points']){
        //         $rank=$rank;
        //     }else{
        //         $rank+=1;
        //     }
        //     echo $value['id'].'-------------'.$rank.'---------'.$value['pool_id'].'----------'.$value['total_points']."<br>";
        //     $total_points=$value['total_points'];
        //     $pool_id=$value['pool_id'];
        //     $value['rank']=$rank;
        //     $value->update();
        // }
        $priviousWeek=priviousWeek();
        //echo $priviousWeek."<br>";
        $userTeamQuery=UserContest::join('user_pools','user_pools.id','user_contests.pool_id')->where('user_pools.week_id',$priviousWeek)->select(['user_pools.entry_fees','user_contests.pool_id','user_contests.rank','user_contests.user_id','user_contests.user_team_id','user_contests.winning_distribute','user_contests.id'])->where('user_contests.winning_distribute',0)->orderby('user_contests.rank','asc')->get()->toArray();
        //prr($userTeamQuery);die;
        $winningData=[];
        foreach($userTeamQuery as $key=>$value){
            $winningData[$value['pool_id']][]=$value;
        }
        if(!empty($winningData)){
            foreach($winningData as $pool_id=>$poolData){
                //prr($winningData);
                $totalUserJoin=count($winningData[$pool_id]);
                $countRank=$rank=0;
                $userIdArray=$newArray=[];
                foreach($poolData as $poolValue){
                    $totalPriceGet=$poolValue['entry_fees']*$totalUserJoin;
                    $firstRankprice=$totalPriceGet*75/100;
                    $secondRankprice=$totalPriceGet*15/100;
                    $adminPrice=$totalPriceGet*10/100;
                    if($rank!=0 && $poolValue['rank']!=$rank){
                        $countRank=1;
                    }
                    $newArray['first_price']=$firstRankprice;
                    $newArray['second_price']=$secondRankprice;
                    $newArray['admin_price']=$adminPrice;
                    if($rank==0 || $poolValue['rank']==$rank){
                        $newArray['rank'][$poolValue['rank']]['count']=$countRank+1;
                        $newArray['rank'][$poolValue['rank']]['user_id'][]=$poolValue['user_id'];                        
                        $countRank=$countRank+1;
                    }else{
                        $newArray['rank'][$poolValue['rank']]['count']=$countRank;
                        $newArray['rank'][$poolValue['rank']]['user_id'][]=$poolValue['user_id'];
                    }
                    $rank=$poolValue['rank'];
                }

                if(!empty($newArray)){
                    foreach($newArray as $key=>$count){
                        if($key=='rank' && !empty($count)){
                            foreach($count as $rank=>$value){
                                $total_price=$eachUser=0;
                                if($rank==1 && $value['count']>1){
                                    $total_price=$newArray['first_price']+$newArray['second_price'];
                                    $eachUser=$total_price/$value['count'];
                                    //prr($value);
                                }elseif($rank==1 && $value['count']==1){
                                    $eachUser=$newArray['first_price'];
                                }elseif($rank==2){
                                    $eachUser=$newArray['second_price']/$value['count'];
                                }
                                foreach($value['user_id'] as $user_id){
                                    if(User::where('id', $user_id)->increment('wallet',$eachUser)){
                                        $payment            = new Payment;
                                        $payment->user_id   = $poolValue['user_id'];
                                        $payment->amount    = $eachUser;
                                        $payment->type      = 'CONTEST WON';
                                        $payment->transaction_id = uniqid();
                                        $payment->save();
                                        UserContest::where('pool_id',$pool_id)->update(['winning_distribute'=>1]);
                                    }
                                }
                                if($rank==1 && $value['count']>1){
                                    break;
                                }
                            }
                        }
                    }
                }
            }   
        }
        echo "Ttt";die;
        prr($winningData);
    }

    public function setuserTeamtotal($fixtureId=null){
        $week=currentWeek();
        $user_team = UserTeam::where('current_week',$week)->get();
        foreach($user_team as $key=>$teamValue){
            $total_points=0;
            $players = $teamValue['players'];
            $selected_player = json_decode($players, true);
            
            $squads = Squad::whereIn('squads.player_id', $selected_player)->where('squads.week_id',$teamValue['current_week'])->pluck('total_points','player_id')->toArray();
            
            $playing11Data = Squad::whereIn('squads.player_id', $selected_player)->where('squads.week_id',$teamValue['current_week'])->pluck('playing11','player_id')->toArray();
            
                $substitude_player=json_decode($teamValue->substitude,true);
                
                $count=0;
                $final_substitude_player=$new_substitude_players=[];
                $positionGet=Player::whereIn('id',$selected_player)->where('position_id',1)->select(['players.id'])->get()->first()->toArray();
                foreach($playing11Data as $key=>$status){
                    if($status==0 && count($new_substitude_players)<2){
                        $new_substitude_players[]=$key;
                        $count+=1;
                    }
                }
                if(count($new_substitude_players)<2){
                    $new_substitude_players=[];
                }
                $goalKeeperSubstitude='';
                if(in_array($positionGet['id'],$new_substitude_players)){
                    $goalKeeperSubstitude=$positionGet['id'];
                }
                $final_substitude_player=!empty($new_substitude_players)?$new_substitude_players:$substitude_player;
                $played_player=array_diff($selected_player,$final_substitude_player);
                
                foreach($played_player as $player_id){
                    if($teamValue->captain==$player_id && empty($goalKeeperSubstitude)){
                        $total_points += isset($squads[$player_id])?$squads[$player_id]*2:0;
                    }else{
                        $total_points += isset($squads[$player_id])?$squads[$player_id]:0;
                    }
                }
                $teamValue->total_points=$total_points;
                $teamValue->substitude=json_encode($final_substitude_player);
                $teamValue->update();
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
        $getSeason=$api->team("season/19273");
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

        $fixtures = $api->getFixture(now()->toDateString() .'/' . now()->addDays(5)->toDateString().'?include=news,localTeam,visitorTeam');

        //$fixtures=json_decode($fixtures_data,true);
        log::info("6666666666666");
        //prr($fixtures);
        $setSeasonId='';
        foreach($fixtures as $value){
                // if($value['season_id']!='18378'){
                //     continue;
                // }
                if($value['league_id']!='1538'){
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
                log::info("fffffffffffff");

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
                        
                        // GetSquad::dispatch($value['id']);
                        // $lineupSchedule = Carbon::parse($fixtureQuery->starting_at)->addMinutes(-45);
                        // log::info($lineupSchedule);
                        // Getlineup::dispatch($fixtureQuery->id)->delay($lineupSchedule);
                        // GetScore::dispatch($fixtureQuery->id)->delay(Carbon::parse($fixtureQuery->starting_at)->addMinute(1));
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
}
