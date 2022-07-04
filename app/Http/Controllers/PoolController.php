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

        $user     = User::select('user_name','email')->where(['role_id'=>3])->inRandomOrder()->limit(5)->get();
        $topplayers = Squad::join('players','players.id','=','squads.player_id')->where(['squads.week_id'=>currentWeek()])->orderByDesc('total_points')->limit(10)->get();

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
        $trending = CreatePost::select(['create_posts.*',DB::raw('(SELECT count(id) FROM comments as c WHERE c.post_id=create_posts.id) as comment')])->where(['user_id'=>$user_id])->orderBy("comment",'desc')->get();
        //prr($upcomingPool);
           return view('users/pools/index',['newsdata'=>$newsdata,'user'=>$user,'trending'=>$trending,'completeDate'=>$completeDate,'upcomingPool'=>$upcomingPool,'livePool'=>$livePool,'completePool'=>$completePool,'currentDate'=>$currentDate,'upcomingDate'=>$upcomingDate,'topplayers'=>$topplayers]);
    }

    public function createPool()
    {


        // echo 'sljhf';die;
        $user_id  = Auth::user()->id;
        $team     = UserTeam::where([['user_id',$user_id],['week',nextWeek()]])->get();
        // prr(count($team));
        if(count($team) == 0){
            return redirect('/create-team')->with('info','You Cant Create Pool, first create team');
        }
        // if()
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
            $wallet = Auth::user()->wallet;
            // echo $wallet;die;
            $entry_fees = $request->input('entry_fees');
            if($entry_fees > $wallet){
                return redirect()->back()->with('message','You have not sufficant balance!');

            }

            
            $user = Auth::user();
            $user->wallet    = $wallet - $entry_fees;
            $user->save();

            $payment            = new Payment;
            $payment->user_id   = Auth::user()->id;
            $payment->amount    = $entry_fees;
            $payment->type      = 'POOL JOIN';
            $payment->transaction_id = uniqid();
            //$payment->status = 1;
            $payment->save();
            

            $pool = new UserPool;
            $pool->user_id    = Auth::user()->id;
            $pool->pool_name   = $request->input('pool_name');
            $pool->pool_type   = $request->input('pool_type');
            $pool->max_participants = $request->input('max_participants');
            $pool->week_id = nextWeek();
            if($request->input('pool_type') == '1'){
                $pool->password =  Hash::make($request->input('password'));
            }
            $pool->entry_fees =  $entry_fees;
            $pool->save();
            //prr($pool);
            // if($request->input('pool_type') == '1' && $pool->save() ){
                $contest = new UserContest;
                $contest->user_id    = Auth::user()->id;
                $contest->pool_id    = $pool->id;
                $contest->user_team_id = $request->input('team_id');
                $contest->save();
            // }else{
                // $pool->save();
            // }
            $weekData=Week::find(nextWeek())->toArray();
            $type=($request->input('pool_type')==0)?"Public":"Private";
            $starting_at=$ending_at='';
            if(!empty($weekData)){
                $starting_at=$weekData['starting_at'];
                $ending_at=$weekData['ending_at'];

            }
            $emailValue=Auth::user()->email;
            $data = ['name'=>Auth::user()->user_name,'email'=>$request->email,'pool_name'=>$request->input('pool_name'),'type'=>$type,'max_participants'=>$request->input('max_participants'),'entry_fees'=>$entry_fees,'starting_at'=>$starting_at,'ending_at'=>$ending_at];
            Mail::send('joinpool_mail', $data, function($message) use ($emailValue)  {
                $message->to($emailValue, 'Tutorials Point')->subject
                ('All Star Join Pool');
                
            });
            return view('users/pools/poolcreated',['pool_name'=>$request->input('pool_name'),'entry_fees'=>$request->input('entry_fees')]);

        }
        
        return redirect()->back()->with('message','You Cant Create Pool this Time');

    }


    public function invitePool($id){
        $pool = UserPool::find($id)->toArray();
        //prr($pool);
        return view('users/invite',['pool_name'=>$pool['pool_name'],'entry_fees'=>$pool['entry_fees'],'id'=>$id]);
    }


    public function invite(Request $request){
       
        $users = $request->input('email');
  
        foreach ($users as $key => $user) {
            Mail::to($user)->send(new UserEmail($user));
        }
        return redirect('/my-pool')->with('message','Email(s) Sent Successfully..');
        // return response()->json(['success'=>'Send email successfully.']);
    }
}
