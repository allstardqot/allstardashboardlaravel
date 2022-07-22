<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\UserTeam;
use App\Models\News;
use App\Models\UserContest;
use App\Models\Week;
use App\Models\Payment;
use App\Models\UserPool;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Squad;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Cookie;
use App\Mail\UserEmail;
use App\Models\CreatePost;
use Mail;

class PoolController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $cookie = \Cookie::queue(\Cookie::forget('selected_player'));
        \Cookie::queue(\Cookie::forget('step'));
        \Cookie::queue(\Cookie::forget('editId'));
        \Cookie::queue(\Cookie::forget('substitude'));

        
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        
        // echo $cookie;die;
        $newsdata     = News::query()->orderByDesc('news_created_at')->limit(5)->get();

        $user_id    = Auth::user()->id;
        //$poolData = UserPool::query()->where(['user_id'=>$user_id])->get();
        $poolQuery=UserContest::join('user_pools','user_pools.id','=','pool_id')->join('user_teams','user_teams.id','=','user_team_id')->where('user_contests.user_id',$user_id)->select(['user_pools.*','user_contests.id as ucid','user_contests.user_id','user_teams.week',DB::raw('(select count(uc.id) from user_contests as uc where uc.pool_id=user_pools.id) as joined')])->get();
        $completeDate = $currentDate=$upcomingDate=$upcomingPool=$livePool=$completePool=[];

        $user     = User::select('user_name','profile_image','email')->where(['role_id'=>3])->inRandomOrder()->limit(10)->get();
        $topplayers = Squad::join('players','players.id','=','squads.player_id')->where(['squads.week_id'=>currentWeek()])->orderByDesc('total_points')->limit(10)->get();
        foreach($topplayers as $value){
            $playerpointTotal = UserTeam::select([DB::raw('(select count(ut.id) from user_teams as ut where ut.current_week='.currentWeek().' and ut.players like "%'.$value->player_id.'%") as gw_pictotal'),DB::raw('(select count(ut.id) from user_teams as ut where ut.players like "%'.$value['id'].'%") as pictotal')])->first()->toArray();
            $value['pictotal']      = $playerpointTotal['pictotal'];
            
        }

        $nextWeek = nextWeek();
        $currentWeek = currentWeek();
        foreach($poolQuery as $key=>$poolValue){
            if($key==0){
                if($nextWeek>0){
                    $upcomingDate=Week::find($nextWeek)->toArray();
                }
                if($currentWeek>0){
                    $currentDate = Week::find($currentWeek)->toArray();
                }
                if(currentWeek()>0){
                    $completeDate=Week::where('id','<',currentWeek())->orderByDesc('id')->first();
                }
            }

           
            if($poolValue['week']==$nextWeek){
                $upcomingPool[]=$poolValue;
            }
            if($poolValue['week']==$currentWeek){
                $livePool[]=$poolValue;
            }
            if($poolValue['week'] < $currentWeek){
                // prr($poolValue);
                $completePool[] = $poolValue;
            }

            // if($_SERVER['REMOTE_ADDR'] == '49.204.163.246'){

            //     // prr($completeDate->starting_at);
            // }
        }
        $trending = CreatePost::select(['create_posts.*',DB::raw('(SELECT count(id) FROM comments as c WHERE c.post_id=create_posts.id) as comment')])->where('create_posts.status',1)->orderBy("comment",'desc')->get();
           return view('users/pools/index',['newsdata'=>$newsdata,'user'=>$user,'trending'=>$trending,'completeDate'=>$completeDate,'upcomingPool'=>$upcomingPool,'livePool'=>$livePool,'completePool'=>$completePool,'currentDate'=>$currentDate,'upcomingDate'=>$upcomingDate,'topplayers'=>$topplayers]);
    }

    public function createPool()
    {
        $user_id  = Auth::user()->id;
        $team     = UserTeam::where([['user_id',$user_id],['week',nextWeek()]])->get();
        if(count($team) == 0){
            return redirect('/create-team')->with('info','Create Team Before Creating A Pool');
        }
        return view('users/pools/createpool',['team'=>$team]);
    }

    public function insert(Request $request){
        request()->validate([
            'pool_name' => 'required',
            'pool_type' => 'required',
            'max_participants' => 'required|numeric',
            'entry_fees' => 'required|numeric',
        ]);

       
        if($request->pool_type==1){
            request()->validate([
                'pool_name' => 'required',
                'pool_type' => 'required',
                'max_participants' => 'required|numeric',
                'entry_fees' => 'required|numeric',
                'password' => 'required',
                'team_id'=>'required'
            ]);
        }
        if(nextWeek() != 0){

            $pass ='';
            $starting_at=$ending_at='';

            $wallet         = Auth::user()->wallet;
            $user_name      = Auth::user()->user_name;
            $entry_fees     = $request->input('entry_fees');

            if($entry_fees > $wallet  ){
                return redirect()->back()->with('error','You have not sufficant balance!');
            }

            if($entry_fees < 0){
                return redirect()->back()->with('error',"You can't Enter in Minus Entry Fees!");
            }
            
            $weekData=Week::find(nextWeek())->toArray();
            
            if(!empty($weekData)){
                $starting_at  = $weekData['starting_at'];
                $ending_at    = $weekData['ending_at'];
            }
            
            $user = Auth::user();
            $user->wallet    = $wallet - $entry_fees;
            $user->save();
            
            
            $pool_type        = $request->input('pool_type');
            $max_participants = $request->input('max_participants');
            $pool_name        = $request->input('pool_name');
            $team_id          = $request->input('team_id');
            
            
            $pool = new UserPool;
            $pool->user_id     = Auth::user()->id;
            $pool->pool_name   = $pool_name;
            $pool->pool_type   = $pool_type;
            $pool->max_participants = $max_participants;
            $pool->week_id = nextWeek();

            if($pool_type == '1'){
                $pool->password =  Hash::make($request->input('password'));
                $pool->decrypt_pass =  $request->input('password');
                $pass = 'Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$request->input('password');
            }

            $pool->entry_fees =  $entry_fees;
            $pool->save();

            $payment                = new Payment;
            $payment->user_id       = Auth::user()->id;
            $payment->amount        = $entry_fees;
            $payment->type          = 'POOL JOIN';
            $payment->user_pool_id  = $pool->id;
            $payment->transaction_id = uniqid();
            $payment->save();

            
           
            $contest = new UserContest;
            $contest->user_id    = Auth::user()->id;
            $contest->pool_id    = $pool->id;
            $contest->user_team_id = $team_id;
            $contest->save();
            
           
            $type     = ($pool_type==0) ? "Public" : "Private";
            $UserTeam = UserTeam::find($team_id);
            // prr($UserTeam->name);
           
            $emailValue     =  Auth::user()->email;
            $email_name     = 'JOIN POOL';
            $email_template =  emailTemplate($email_name);
            $subject = $email_template->subject;

            $message1	=	str_replace(['{{USER_NAME}}','{{POOL_NAME}}','{{STARTING_DATE}}','{{END_DATE}}','{{TYPE}}','{{PASSWORD}}','{{TEAM_NAME}}','{{MAX_PARTICIPANTS}}','{{ENTRY_FEES}}'],[$user_name,$pool_name,$starting_at,$ending_at,$type,$pass,$UserTeam->name,$max_participants,$entry_fees],$email_template->template);
            $data  = ['message1'=>$message1];

            Mail::send('joinpool_mail', $data, function($message) use ($emailValue ,$subject )   {
                $message->to($emailValue, 'Tutorials Point')->subject
                ($subject);
                
            });

            return view('users/pools/poolcreated',['pool_name'=>$pool_name,'pass'=>$pass,'starting_at'=>$starting_at,'ending_at'=>$ending_at,'team_name'=>$UserTeam->name,'pool_type'=>$pool_type,'entry_fees'=>$request->input('entry_fees'),'max_participants'=>$max_participants]);

        }
        
        return redirect()->back()->with('message','You Cant Create Pool this Time');

    }


    public function invitePool($id){

        $pool = UserPool::find($id)->toArray();
        $weekData=Week::find(nextWeek())->toArray();
        $starting_at=$ending_at='';

        if(!empty($weekData)){
            $starting_at=$weekData['starting_at'];
            $ending_at=$weekData['ending_at'];
        }

        $pool_type = $pool['pool_type'] == 1 ? 'Private' : 'Public' ;
        $pass      = !empty($pool['decrypt_pass'])  ? $pool['decrypt_pass'] : '';


        return view('users/invite',['pool_name'=>$pool['pool_name'],'pass'=>$pass,'starting_at'=>$starting_at,'ending_at'=>$ending_at,'pool_type'=>$pool_type,'entry_fees'=>$pool['entry_fees'],'max_participants'=>$pool['max_participants'],'id'=>$id]);
    }


    public function invite(Request $request){
       
        $users = $request->input('email');
        $type = $request->pool_type == 1 ? 'Private' : 'Public';
        $pool_name = $request->pool_name;
        $max_participants = $request->max_participants;
        $entry_fees = $request->entry_fees;
        $starting_at = $request->starting_at;
        $ending_at = $request->ending_at;
        $user_name = !empty($request->name)?$request->name:'User';
        $pass      = !empty($request->pass) ? '<tr><td>Password </td><td>'.$request->pass.'</td></tr>' : '';
        $sender_name  = Auth::user()->user_name;
        // $data = ['entry_fees'=>$request->entry_fees,'starting_at'=>$request->starting_at,'ending_at'=>$request->ending_at];
        // $email = $request->email;


        $email_name     = 'INVITE POOL';
        $email_template =  emailTemplate($email_name);
        $subject = $email_template->subject;

        $message1	=	str_replace(['{{USER_NAME}}','{{SENDER_NAME}}','{{POOL_NAME}}','{{START_DATE}}','{{END_DATE}}','{{TYPE}}','{{PASSWORD}}','{{MAX_PARTICIPATE}}','{{ENTRY_FEES}}'],[$user_name,$sender_name,$pool_name,$starting_at,$ending_at,$type,$pass,$max_participants,$entry_fees],$email_template->template);

        $data  = ['message1'=>$message1];

// prr($message1);
        foreach ($users as $key => $user) {
            // Mail::to($user)->send(new UserEmail($user));
            Mail::send('mail', $data, function($message) use ($user,$subject)  {
                $message->to($user, 'Allstar User')->subject
                ($subject);
                
            });
        }
        return redirect('/my-pool')->with('message','Email(s) Sent Successfully..');
        // return response()->json(['success'=>'Send email successfully.']);
    }
}
