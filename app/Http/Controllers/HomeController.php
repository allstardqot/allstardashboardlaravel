<?php

namespace App\Http\Controllers;

use App\Models\CreatePost;
use Illuminate\Http\Request;
use App\Models\UserPool;
use App\Models\UserTeam;
use App\Models\Week;
use App\Models\News;
use App\Models\UserContest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;

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
        $newsdata     = News::query()->orderByDesc('news_created_at')->limit(5)->get();
        $searchData   = $request->searchData;
        $type         = $request->type;
        $publicQuery  = UserPool::query();
        $privateQuery = UserPool::query();
        $user     = User::select('user_name')->where(['role_id'=>3])->inRandomOrder()->limit(5)->get();

        $jointuser = UserContest::join('user_pools','user_pools.id','=','pool_id')->join('user_teams','user_teams.id','=','user_team_id')->select(['user_pools.id','user_teams.week',DB::raw('(select count(uc.id) from user_contests as uc where uc.pool_id=user_pools.id) as joined')])->pluck('joined','user_pools.id')->toArray();

        $contest_pool = UserContest::where('user_id',$user_id)->pluck('pool_id')->toArray();
        //$team = Team::get();
        $team = UserTeam::where([['user_id',$user_id],['week',nextWeek()]])->get();
       
        $publicData  = $publicQuery->where(['pool_type'=>0 ,'week_id'=>nextWeek()])->get();
        $privateData = $privateQuery->where(['pool_type'=>1,'week_id'=>nextWeek()])->get();
        if(!empty($searchData)){
            if($searchData!="Search"){
                if($type=="public"){
                    $publicData=$publicQuery->where('pool_name', 'LIKE', '%' . $searchData . '%')->get();
                }else{
                    $privateData=$privateQuery->where('pool_name', 'LIKE', '%' . $searchData . '%')->get();
                }
            }
            $weeak=[];
            if(currentWeek()>0){
                $weeak=Week::find(nextWeek())->toArray();
            }
            return view('users/homehtml',['publicData'=>$publicData,'privateData'=>$privateData,'type'=>$type,'team'=>$team,'newsdata'=>$newsdata,'contest_pool'=>$contest_pool,'jointuser'=>$jointuser,'weeak'=>$weeak]);
        }
        $trending = CreatePost::select(['create_posts.*',DB::raw('(SELECT count(id) FROM comments as c WHERE c.post_id=create_posts.id) as comment')])->where(['user_id'=>$user_id])->orderBy("comment",'desc')->get();

        //prr($publicData);
        return view('users/home',['publicData'=>$publicData,'privateData'=>$privateData,'type'=>$type,'team'=>$team,'newsdata'=>$newsdata,'trending'=>$trending,'user'=>$user]);
    }

    public function jointeam(Request $request){
        $contest_data=new UserContest();
        $contest_data->pool_id=$request->input('join_pool_id');
        $contest_data->user_id=Auth::user()->id;
        $contest_data->user_team_id=$request->input('select_team');
        if($contest_data->save()){
            return redirect('my-pool')->with('message','Pool Join Successfully.');
        }else{
            return redirect('home')->with('message',"Cant't Join this pool.");
        }
    }
}
