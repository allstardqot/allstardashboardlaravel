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
use App\Models\Week;

use Mail;

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
        $this->queue = 'winningprocess';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //winning distribute
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
                                        $weeak=Week::find(priviousWeek())->toArray();

                                        $userData=User::find($user_id)->toArray();
                                        $data = ['name'=>$userData['user_name'],'amount'=>$eachUser,'gameweek_date'=>$eachUser,'starting_at'=>$weeak['starting_at'],'ending_at'=>$weeak['ending_at']];
                                        $payment            = new Payment;
                                        $payment->user_id   = $user_id;
                                        $payment->amount    = $eachUser;
                                        $payment->type      = 'CONTEST WON';
                                        $payment->transaction_id = uniqid();
                                        if($payment->save()){
                                            Mail::send('winning_mail', $data, function($message) use ($userData)  {
                                                $message->to($userData['email'], 'Tutorials Point')->subject
                                                    ('Winnings Distribution All Star');
                                                
                                                });
                                        }
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
    }
}
