<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\UserContest;
use App\Models\UserTeam;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\CreatePost;
use Illuminate\Support\Facades\DB;
use Auth;

class LeaderboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $cookie = \Cookie::queue(\Cookie::forget('selected_player'));
        \Cookie::queue(\Cookie::forget('step'));
        \Cookie::queue(\Cookie::forget('editId'));
        \Cookie::queue(\Cookie::forget('substitude'));
    }
    public function index(){
        return view('users/leaderboard/index');
    }

    public function viewdetail($id){
        $user_contest=UserContest::find($id)->toArray();
        $user_id=Auth::user()->id;
        $newsdata=News::query()->orderByDesc('news_created_at')->limit(5)->get();
        $trending = CreatePost::select(['create_posts.*',DB::raw('(SELECT count(id) FROM comments as c WHERE c.post_id=create_posts.id) as comment')])->where(['user_id'=>$user_id])->orderBy("comment",'desc')->get();

        if(!empty($user_contest['user_team_id'])){
            $userTeam = UserTeam::find($user_contest['user_team_id'])->toArray();
            $result = [];
            $players = $userTeam['players'];
            $plyArr = json_decode($players, true);
            //p($players);
            $result = Player::join('positions', 'positions.id', '=', 'players.position_id')->whereIn('players.id', $plyArr)->orderBy('positions.id', 'ASC')->select(['players.*','positions.name'])->get()->toArray();
            $result['team_name'] = $userTeam['name'];
            $result['captain_id'] = $userTeam['captain'];
            $result['id'] = $userTeam['id'];
        }
        return view('users/leaderboard/index',compact('result','newsdata','trending','userTeam'));
    }

    
}
