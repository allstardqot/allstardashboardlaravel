<?php

namespace App\Jobs;

use App\EntitySport;
use App\Models\Fixture;
use App\Models\Player;
use App\Models\UserContest;
use App\Models\Squad;
use App\Models\UserTeam;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


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
    public function __construct()
    {
        $this->queue = 'setuserteamtotal';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //total point update
        $week=currentWeek();
        $user_team = UserTeam::where('week',$week)->get();
        foreach($user_team as $key=>$teamValue){
            $total_points=0;
            $players = $teamValue['players'];
            $selected_player = json_decode($players, true);

            $squads = Squad::whereIn('squads.player_id', $selected_player)->where('squads.week_id',$teamValue['week'])->pluck('total_points','player_id')->toArray();

            $playing5Data = Squad::whereIn('squads.player_id', $selected_player)->where('squads.week_id',$teamValue['week'])->pluck('playing11','player_id')->toArray();

                $substitude_player=json_decode($teamValue->substitude,true);

                $count=0;
                $final_substitude_player=$new_substitude_players=[];
                $positionGet=Player::whereIn('id',$selected_player)->where('position_id',1)->select(['players.id'])->get()->first()->toArray();
                foreach($playing5Data as $key=>$status){
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

        //rank update
        $userContestQuery=UserContest::join('user_teams as ut','ut.id','user_contests.user_team_id')->select(['ut.total_points','user_contests.pool_id','user_contests.rank','user_contests.id'])->orderBy('pool_id','asc')->orderBy('total_points','desc')->get();
        $rank=$pool_id=$total_points=0;
        foreach($userContestQuery as $key=>$value){
            if($pool_id==0 || $pool_id!=$value['pool_id']){
                $rank=0;
            }

            if($pool_id==$value['pool_id'] && $total_points==$value['total_points']){
                $rank=$rank;
            }else{
                $rank+=1;
            }
            $total_points=$value['total_points'];
            $pool_id=$value['pool_id'];
            $value['rank']=$rank;
            $value->update();
        }
    }
}
