<?php

namespace App\Jobs;
use App\Models\Payment;
use App\Models\UserContest;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class WinningProcess implements ShouldQueue
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

        //winning distribute
        $priviousWeek=priviousWeek();
        $userTeamQuery=UserContest::join('user_pools','user_pools.id','user_contests.pool_id')->where('user_pools.week_id',$priviousWeek)->select(['user_pools.entry_fees','user_contests.pool_id','user_contests.rank','user_contests.user_id','user_contests.user_team_id'])->orderby('user_contests.rank','asc')->get()->toArray();

        $winningData=[];
        foreach($userTeamQuery as $key=>$value){
            $winningData[$value['pool_id']][]=$value;
        }
        if(!empty($winningData)){
            foreach($winningData as $pool_id=>$poolData){
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
    }
}
