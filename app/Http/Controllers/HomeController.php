<?php

namespace App\Http\Controllers;

use App\Models\CreatePost;
use Illuminate\Http\Request;
use App\Models\UserPool;
use App\Models\UserTeam;
use App\Models\Week;
use App\Models\News;
use App\Models\UserContest;
use Illuminate\Support\Facades\Hash;
use App\Models\Squad;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use Auth;
use App\Mail\UserEmail;
use Mail;

class HomeController extends Controller
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
    public function index(Request $request)
    {
        $user_id      = Auth::user()->id;
        $wallet      = Auth::user()->wallet;
        $newsdata     = News::query()->orderByDesc('news_created_at')->limit(5)->get();
        $searchData   = $request->searchData;
        $type         = $request->type;
        $publicQuery  = UserPool::query();
        $privateQuery = UserPool::query();
        $user         = User::select('user_name','profile_image','email')->where(['role_id'=>3])->inRandomOrder()->limit(10)->get();

        $jointuser = UserContest::join('user_pools','user_pools.id','=','pool_id')->join('user_teams','user_teams.id','=','user_team_id')->select(['user_pools.id','user_teams.week',DB::raw('(select count(uc.id) from user_contests as uc where uc.pool_id=user_pools.id) as joined')])->pluck('joined','user_pools.id')->toArray();

        
        $topplayers = Squad::join('players','players.id','=','squads.player_id')->where(['squads.week_id'=>currentWeek()])->orderByDesc('total_points')->limit(10)->get();
        foreach($topplayers as $value){
            $playerpointTotal = UserTeam::select([DB::raw('(select count(ut.id) from user_teams as ut where ut.current_week='.currentWeek().' and ut.players like "%'.$value->player_id.'%") as gw_pictotal'),DB::raw('(select count(ut.id) from user_teams as ut where ut.players like "%'.$value['id'].'%") as pictotal')])->first()->toArray();
            $value['pictotal']      = $playerpointTotal['pictotal'];
            
        }
        
        if($_SERVER['REMOTE_ADDR'] == '49.204.161.65'){

            // prr($topplayers);
        }

        $contest_pool = UserContest::where('user_id',$user_id)->pluck('pool_id')->toArray();
        //$team = Team::get();
        $team = UserTeam::where([['user_id',$user_id],['week',nextWeek()]])->get();
       
        

         // Join Pool Count From User Contest
         $publicData  = $publicQuery->where(['pool_type'=>0 ,'week_id'=>nextWeek()])->get();
         $privateData = $privateQuery->where(['pool_type'=>1,'week_id'=>nextWeek()])->get();
        
        if(!empty($searchData)){
            if($searchData!="Search"){
                if($type=="public"){
                    $publicData = $publicQuery->where('pool_name', 'LIKE', '%' . $searchData . '%')->get();
                }else{
                    $privateData=$privateQuery->where('pool_name', 'LIKE', '%' . $searchData . '%')->get();
                }
            }
            $weeak=[];
            if(currentWeek()>0){
                $weeak=Week::find(nextWeek())->toArray();
            }
            return view('users/homehtml',['publicData'=>$publicData,'wallet'=>$wallet,'privateData'=>$privateData,'type'=>$type,'team'=>$team,'newsdata'=>$newsdata,'contest_pool'=>$contest_pool,'jointuser'=>$jointuser,'weeak'=>$weeak]);
        }
        $trending = CreatePost::select(['create_posts.*',DB::raw('(SELECT count(id) FROM comments as c WHERE c.post_id=create_posts.id) as comment')])->where('create_posts.status',1)->orderBy("comment",'desc')->get();

        //prr($publicData);
        return view('users/home',['publicData'=>$publicData,'wallet'=>$wallet,'privateData'=>$privateData,'type'=>$type,'team'=>$team,'newsdata'=>$newsdata,'trending'=>$trending,'user'=>$user,'topplayers'=>$topplayers]);
    }

    public function jointeam(Request $request){
        request()->validate([
            'user_team_id' => 'required',
        ]);
        
        $join_pool_id   =     $request->input('join_pool_id');
        $pool           = UserPool::findOrFail($join_pool_id);
        $entry_fees = $pool['entry_fees'];

        if($request->input('hiddenpooltype') == 1){
            request()->validate([
                'password' => 'required',
            ]);
            $password = $request->input('password');
            if (!Hash::check($password, $pool->password)) {
                return redirect()->back()->with('error', 'Join Failed, plz check password');
             }
        }

        $wallet = Auth::user()->wallet;
       
        if($entry_fees > $wallet){
            return redirect()->back()->with('error','You have not sufficant balance!');
        }

        
        $contest_data           = new UserContest();
        $contest_data->pool_id  = $join_pool_id;
        $contest_data->user_id  = Auth::user()->id;
        $contest_data->user_team_id = $request->input('user_team_id');
        
        if($contest_data->save()){
            
            $user = Auth::user();
            $user->wallet    = $wallet - $entry_fees;
            $user->save();
    
            $payment            = new Payment;
            $payment->user_id   = Auth::user()->id;
            $payment->amount    = $entry_fees;
            $payment->type      = 'POOL JOIN';
            $payment->user_pool_id  = $join_pool_id;
    
            $payment->transaction_id = uniqid();
            //$payment->status = 1;
            $payment->save();
            
            $userPoolData=UserPool::find($join_pool_id)->toArray();

            if(!empty($userPoolData)){

                $weekData=Week::find(nextWeek())->toArray();
                $type=($userPoolData['pool_type']==0)?"Public":"Private";
                $starting_at=$ending_at='';

                if(!empty($weekData)){
                    $starting_at=$weekData['starting_at'];
                    $ending_at=$weekData['ending_at'];

                }
                $userTeamData=UserTeam::find($request->input('user_team_id'))->toArray();
                $teamName=$userTeamData['name'];
                $emailValue=Auth::user()->email;
                $data = ['name'=>Auth::user()->user_name,'email'=>$request->email,'pool_name'=>$userPoolData['pool_name'],'type'=>$type,'max_participants'=>$userPoolData['max_participants'],'entry_fees'=>$userPoolData['entry_fees'],'starting_at'=>$starting_at,'ending_at'=>$ending_at,'team_name'=>$teamName];
                Mail::send('joinpool_mail', $data, function($message) use ($emailValue)  {
                    $message->to($emailValue, 'Tutorials Point')->subject
                    ('All Star Join Pool');
                    
                });
            }
            return redirect('my-pool')->with('message','Pool Joined Successfully 😊.');
        }else{
            return redirect('home')->with('error',"Cant't Join this pool.");
        }
    }


    public function fetchpool(){
        $user_id = Auth::user()->id;
        $pool_type = $_GET['id'] == 'Private Pool' ? 1 : 0 ;
        
        $user_pool = UserPool::select(['id','pool_name'])->where(['pool_type'=>$pool_type,'week_id'=>nextWeek(),'user_id'=>$user_id])->get();
        
        $html = '';
        if($user_pool->count() > 0){
            foreach($user_pool as $data){
                $html .= '<option value="'.$data->id.'">'.$data->pool_name.'</option>';
            }
        }else{
            $html = '<option value="">First Create Pool</option>';
        }
        
        return $html;
    }

    public function userinvite(Request $request){
        
        $userPoolData=UserPool::find($request->pool_id)->toArray();
        if(!empty($userPoolData)){
            
                $type=($userPoolData['pool_type']==0)?"Public":"Private";
                $weekData=Week::find($userPoolData['week_id'])->toArray();
                $starting_at=$ending_at='';
                if(!empty($weekData)){
                    $starting_at=$weekData['starting_at'];
                    $ending_at=$weekData['ending_at'];

                }
                $data = ['name'=>!empty($request->name)?$request->name:'User','email'=>$request->email,'pool_name'=>$userPoolData['pool_name'],'type'=>$type,'max_participants'=>$userPoolData['max_participants'],'entry_fees'=>$userPoolData['entry_fees'],'starting_at'=>$starting_at,'ending_at'=>$ending_at];
                $email = $request->email;
                if(is_array($email)){
                    foreach($email as $emailValue){
                        Mail::send('mail', $data, function($message) use ($emailValue)  {
                            $message->to($emailValue, 'Tutorials Point')->subject
                            ('All Star Invite');
                            
                        });
                    }
                }else{
                    Mail::send('mail', $data, function($message) use ($email)  {
                    $message->to($email, 'Tutorials Point')->subject
                        ('All Star Invite');
                    
                    });
                }
                return redirect('home')->with('message',"Email(s) Sent Successfully.");
        }
    }

    public function joinusers(){
        $id = $_GET['id'];
        
        $join_user = UserContest::join('users','users.id','=','user_contests.user_id')->select('users.user_name')->where('user_contests.pool_id',$id)->get();
        $html = '';
        $id =1;
        if($join_user->count() > 0){
            foreach($join_user as $data){
                $html .= '<tr>
                    <th scope="row">'. $id.'</th>
                    <td>'.strtoupper( $data->user_name).'</td>
                  </tr>';

            $id++;
            }
        }else{
            $html = '<span >First Create Pool</span>';
        }
        
        return $html;
    }

    // public function playerdetail(Request $request){
    //     $id = $request->id;


    // }
}
