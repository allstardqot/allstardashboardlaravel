<?php

namespace App\Http\Controllers;

use App\Models\CreatePost;
use Illuminate\Http\Request;
use App\Models\UserPool;
use App\Models\UserTeam;
use App\Models\News;
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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $newsdata=News::query()->orderByDesc('news_created_at')->limit(5)->get();
        $searchData=$request->searchData;
        $type=$request->type;
        $publicQuery=UserPool::query();
        $privateQuery=UserPool::query();
        //$team = Team::get();
        $team = UserTeam::where('user_id',Auth::user()->id)->get();
        // p($team);

        $publicData=$publicQuery->where(['pool_type'=>0])->get();
        $privateData=$privateQuery->where(['pool_type'=>1])->get();
        if(!empty($searchData)){
            if($searchData!="Search"){
                if($type=="public"){
                    $publicData=$publicQuery->where('pool_name', 'LIKE', '%' . $searchData . '%')->get();
                }else{
                    $privateData=$privateQuery->where('pool_name', 'LIKE', '%' . $searchData . '%')->get();
                }
            }
            return view('users/homehtml',['publicData'=>$publicData,'privateData'=>$privateData,'type'=>$type,'team'=>$team,'newsdata'=>$newsdata]);
        }
        $trending = CreatePost::select(['create_posts.*',DB::raw('(SELECT count(id) FROM comments as c WHERE c.post_id=create_posts.id) as comment')])->where(['user_id'=>Auth::user()->id])->orderBy("comment",'desc')->get();

        // echo 'sljhf';die;
        return view('users/home',['publicData'=>$publicData,'privateData'=>$privateData,'type'=>$type,'team'=>$team,'newsdata'=>$newsdata,'trending'=>$trending]);
    }
}
