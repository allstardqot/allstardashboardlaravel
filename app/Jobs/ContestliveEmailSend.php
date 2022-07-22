<?php

namespace App\Jobs;
use App\Models\Payment;
use App\Models\UserContest;
use App\Models\UserPool;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;


use Mail;

class ContestliveEmailSend implements ShouldQueue
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
        $this->queue = 'contestliveemail';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $poolData=UserContest::join('user_pools','user_pools.id','user_contests.pool_id')->join('weeks','weeks.id','user_pools.week_id')->join('users','users.id','user_contests.user_id')->whereDate('weeks.starting_at','<=',Carbon::now())->where('user_pools.email_send',0)->select(['users.email','users.user_name','user_contests.pool_id','user_pools.pool_name'])->get()->toArray();
        $poolIdArray=[];

        $email_name     = 'CONTEST LIVE';
        $email_template =  emailTemplate($email_name);
        $subject = $email_template->subject;

        foreach($poolData as $poolValue){
            // $data = ['pool_name'=>$poolValue['pool_name'],'user_name'=>$poolValue['user_name']];
            $link  = '<a href="'. url('/my-pool') .'">My Pools</a>';
            $message1	= str_replace(['{{USER_NAME}}','{{POOL_NAME}}','{{LINK}}'],[$poolValue['user_name'],$poolValue['pool_name'],$link],$email_template->template);
            $data  = ['message1'=>$message1];

            Mail::send('contest_live_mail', $data, function($message) use ($poolValue,$subject)  {
                $message->to($poolValue['email'], 'Tutorials Point')->subject
                    ($subject);

                });

            $poolIdArray[]=$poolValue['pool_id'];

        }
        $poolIdArray=array_unique($poolIdArray);
        if(!empty($poolIdArray)){
            UserPool::whereIn('id', $poolIdArray)->update(['email_send' => 1]);
        }
    }
}
