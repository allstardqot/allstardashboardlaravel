<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\UserContest;
use App\Models\UserTeam;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('users/leaderboard/index');
    }

    public function viewdetail($id){
        $user_contest=UserContest::find($id)->toArray();

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
        return view('users/leaderboard/index',compact('result'));
    }
}
