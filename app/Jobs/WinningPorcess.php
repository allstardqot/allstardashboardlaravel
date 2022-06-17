<?php

namespace App\Jobs;

use App\EntitySport;
use App\Models\Fixture;
use App\Models\Player;
use App\Models\Squad;
use App\Models\UserTeam;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class WinningPorcess implements ShouldQueue
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
}
