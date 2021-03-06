<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use App\Models\UserTeam;
use App\Models\Squad;
use Auth;
use Illuminate\Support\Facades\Cookie;

class TeamController extends Controller
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
    public function index()
    {       
        $nextWeek=nextWeek();
        $user_id=Auth::user()->id;
        $userTeam = UserTeam::where([['user_id',$user_id],['week',$nextWeek]])->orderBy('user_teams.id', 'DESC')->limit(3)->get()->toArray();

        if (empty($userTeam)) {
            return redirect()->route('create-team')->with('info', 'Please first create team!');
        }

        $mainData = [];
        foreach ($userTeam as $data) {
            $result = [];
            $players = $data['players'];
            $plyArr = json_decode($players, true);
            //p($players);
            $result = Player::join('positions', 'positions.id', '=', 'players.position_id')->whereIn('players.id', $plyArr)->orderBy('positions.id', 'ASC')->select(['players.*','positions.name'])->get()->toArray();
            $result['team_name'] = $data['name'];
            $result['captain_id'] = $data['captain'];
            $result['id'] = $data['id'];
            array_push($mainData, $result);
        }
        return view('users/team', compact('mainData', 'userTeam'));
    }

    public function currentTeam(){
        
        $user_id=Auth::user()->id;
        $currentWeek=currentWeek();
        //$teamCount=UserTeam::where([['week',$currentWeek],['user_id',$user_id]])->count();

        $userTeam = UserTeam::where([['user_id',$user_id],['week',$currentWeek]])->orderBy('user_teams.id', 'DESC')->limit(3)->get()->toArray();

        if (empty($userTeam)) {
            return redirect()->route('team')->with('message', 'Current week team not created.');
        }

        $mainData = [];
        foreach ($userTeam as $data) {
            $result = [];
            $players = $data['players'];
            $plyArr = json_decode($players, true);

            $result = Player::join('positions', 'positions.id', '=', 'players.position_id')->whereIn('players.id', $plyArr)->orderBy('positions.id', 'ASC')->select(['players.*','positions.name'])->get()->toArray();
            $result['team_name'] = $data['name'];
            $result['captain_id'] = $data['captain'];
            $result['total_points'] = $data['total_points'];
            $result['id'] = $data['id'];

            array_push($mainData, $result);
        }
        //prr($mainData);
        return view('users/currentteam', compact('mainData', 'userTeam'));
    }


    public function editTeam(Request $request, $editId = null){
        
        $cookiesArray=[];
        if (!empty($_COOKIE['playerIdArray'])){
            $cookiesArray=explode(',',$_COOKIE['playerIdArray']);
        }
        if(nextWeek()<1){
            return redirect('home')->with("message","Can't create team because admin not set week now.");
        }
        $editId = !empty($request->editId) ? $request->editId : $editId;
        preg_match_all('!\d+!', $editId, $matches);
        if(!empty($editId) && empty($matches[0])){
            return redirect(route("team"));
        }
        $user_id=Auth::user()->id;
        if (!empty($request->selected) && !empty($request->teamName)) {
            $selected = is_array($request->selected) ? $request->selected : explode(',', $request->selected);
            $substitude = is_array($request->substitude) ? $request->substitude : explode(',', $request->substitude);
            //$finalPlay=array_diff($selected,$substitude);
            $teamName = $request->teamName;
            $captain = $request->captain;

            if (!empty($request->editId)) {
                $userTeam = UserTeam::find($request->editId);
            } else {
                $userTeam = new UserTeam;
                $userTeam->current_week = currentWeek();
                $userTeam->week = nextWeek();
            }
            $userTeam->user_id = $user_id;
            $userTeam->captain = $captain;
            $userTeam->substitude = json_encode($substitude);
            $userTeam->players = json_encode($selected);
            $userTeam->name = $teamName;
            if ($userTeam->save()) {
                return true;
            }
        } else {
            $searchData = $request->searchData;
            $point = $request->point;
            $teamfilter = $request->team;
            $min = $request->min;
            $max = $request->max;
            $type = $request->type;
            $team = Team::pluck('name', 'id');

            if (empty($editId)) {
                $nextWeek=nextWeek();
                $teamCount=UserTeam::where([['week',$nextWeek],['user_id',$user_id]])->count();
                if($teamCount>=3){
                    return redirect('team')->with("message","You Can Only Create 3 Teams in a Gameweek");
                }
            }
            if (!empty($searchData)) {
                $user_selected_substitude = $user_selected_player = $goalkeeperData = $defenderData = $midfielderData = $forwardData = [];
                $user_selected_captain = '';

                if (!empty($editId) && UserTeam::find($editId)) {
                    $userTeam = UserTeam::find($editId);
                    $user_selected_player = json_decode($userTeam['players'], true);
                }
                $playerQuery = Player::query();
                $playerData = $playerQuery->select(['players.*',DB::raw('(select sum(sq.total_points) from squads as sq where sq.player_id=players.id) as sum_totalPoints')])->with('Team', 'Position')->get();
                foreach ($playerData as $playerValue) {
                    if ($playerValue['position_id'] == 1) {
                        $goalkeeperData[] = $playerValue;
                    }
                    if ($playerValue['position_id'] == 2) {
                        $defenderData[] = $playerValue;
                    }
                    if ($playerValue['position_id'] == 3) {
                        $midfielderData[] = $playerValue;
                    }
                    if ($playerValue['position_id'] == 4) {
                        $forwardData[] = $playerValue;
                    }
                }
                if ($searchData != "Search") {
                    if ($type == "goalkeeper") {
                        $goalkeeperData = $playerQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id' => 1])->orWhereIn('id',$cookiesArray)->with('Team', 'Position')->get();
                    } elseif ($type == 'defender') {
                        $defenderData = $playerQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id' => 2])->orWhereIn('id',$cookiesArray)->with('Team', 'Position')->get();
                    } elseif ($type == 'midfielder') {
                        $midfielderData = $playerQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id' => 3])->orWhereIn('id',$cookiesArray)->with('Team', 'Position')->get();
                    } elseif ($type = 'forward') {
                        $forwardData = $playerQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id' => 4])->orWhereIn('id',$cookiesArray)->with('Team', 'Position')->get();
                    }
                    //pr($goalkeeperData);
                }
                if (!empty($point) || !empty($teamfilter) || !empty($min) || !empty($max)) {
                    if ($type == "goalkeeper") {
                        $playerQuery->where('players.position_id', 1);
                        if(!empty($teamfilter)){
                            $playerQuery->where('players.team_id', $teamfilter);
                        }
                        if(!empty($min)){
                            $playerQuery->where('players.sell_price','>=',$min)->where('players.sell_price','<=',$max);
                        }
                        if (!empty($point)) {
                            $playerQuery->orderBy('sum_totalPoints', $point);
                        }
                        $goalkeeperData = $playerQuery->orWhereIn('id',$cookiesArray)->with('Team', 'Position')->get();
                        // prr($goalkeeperData);
                    } elseif ($type == 'defender') {
                        $playerQuery->where('players.position_id', 2);
                        if(!empty($teamfilter)){
                            $playerQuery->where('players.team_id', $teamfilter);
                        }
                        if(!empty($min)){
                            $playerQuery->where('players.sell_price','>=',$min)->where('players.sell_price','<=',$max);
                        }
                        if (!empty($point)) {
                            $playerQuery->orderBy('sum_totalPoints', $point);
                        }
                        $defenderData = $playerQuery->orWhereIn('id',$cookiesArray)->with('Team', 'Position')->get();
                    } elseif ($type == 'midfielder') {
                        $playerQuery->where('players.position_id', 3);
                        if(!empty($teamfilter)){
                            $playerQuery->where('players.team_id', $teamfilter);
                        }
                        if(!empty($min)){
                            $playerQuery->where('players.sell_price','>=',$min)->where('players.sell_price','<=',$max);
                        }
                        if (!empty($point)) {
                            $playerQuery->orderBy('sum_totalPoints', $point);
                        }
                        $midfielderData = $playerQuery->orWhereIn('id',$cookiesArray)->with('Team', 'Position')->get();
                    } elseif ($type = 'forward') {
                        $playerQuery->where('players.position_id', 4);
                        if(!empty($teamfilter)){
                            $playerQuery->where('players.team_id', $teamfilter);
                        }
                        if(!empty($min)){
                            $playerQuery->where('players.sell_price','>=',$min)->where('players.sell_price','<=',$max);
                        }
                        if (!empty($point)) {
                            $playerQuery->orderBy('sum_totalPoints', $point);
                        }
                        $forwardData = $playerQuery->orWhereIn('id',$cookiesArray)->with('Team', 'Position')->get();
                    }
                }
                return view('users/createteamajax', ['goalkeeperData' => $goalkeeperData, 'defenderData' => $defenderData, 'midfielderData' => $midfielderData, 'forwardData' => $forwardData, 'type' => $type, 'team' => $team, 'request' => $request, 'user_selected_player' => $user_selected_player, 'editId' => $editId]);
            }
            return view('users/createTeam', ['editId' => $editId]);
        }
    }

    public function createTeam(Request $request, $editId = null)
    {
        $cookiesArray=[];
        if (!empty($_COOKIE['playerIdArray'])){
            $cookiesArray=explode(',',$_COOKIE['playerIdArray']);
        }

        if(nextWeek()<1){
            return redirect('home')->with("message","You Cannot Create Team As No Games Are Available.");
        }
        $editId = !empty($request->editId) ? $request->editId : $editId;
        preg_match_all('!\d+!', $editId, $matches);
        if(!empty($editId) && empty($matches[0])){
            return redirect(route("team"));
        }
        $user_id=Auth::user()->id;
        if (!empty($request->selected) && !empty($request->teamName)) {
            $selected = is_array($request->selected) ? $request->selected : explode(',', $request->selected);
            $substitude = is_array($request->substitude) ? $request->substitude : explode(',', $request->substitude);
            //$finalPlay=array_diff($selected,$substitude);
            $teamName = $request->teamName;
            $captain = $request->captain;

            if (!empty($request->editId)) {
                $userTeam = UserTeam::find($request->editId);
            } else {
                $userTeam = new UserTeam;
                $userTeam->current_week = currentWeek();
                $userTeam->week = nextWeek();
            }
            $userTeam->user_id = $user_id;
            $userTeam->captain = $captain;
            $userTeam->substitude = json_encode($substitude);
            $userTeam->players = json_encode($selected);
            $userTeam->name = $teamName;
            //prr($userTeam);
            if ($userTeam->save()) {
                return true;
            }
        } else {
            $searchData = $request->searchData;
            $point = $request->point;
            $teamfilter = $request->team;
            $min = $request->min;
            $max = $request->max;
            $type = $request->type;
            $team = Team::pluck('name', 'id');

            if (empty($editId)) {
                $nextWeek=nextWeek();
                $teamCount=UserTeam::where([['week',$nextWeek],['user_id',$user_id]])->count();
                if($teamCount>=3){
                    return redirect('team')->with("message","You Can Only Create 3 Teams in a Gameweek.");
                }
            }
            if (!empty($searchData)) {
                $user_selected_substitude = $user_selected_player = $goalkeeperData = $defenderData = $midfielderData = $forwardData = [];
                $user_selected_captain = '';

                if (!empty($editId) && UserTeam::find($editId)) {
                    $userTeam = UserTeam::find($editId);
                    $user_selected_player = json_decode($userTeam['players'], true);
                }
                $playerQuery = Player::query();
                $playerData = $playerQuery->select(['players.*',DB::raw('(select sum(sq.total_points) from squads as sq where sq.player_id=players.id) as sum_totalPoints')])->with('Team', 'Position')->get();
                foreach ($playerData as $playerValue) {
                    if ($playerValue['position_id'] == 1) {
                        $goalkeeperData[] = $playerValue;
                    }
                    if ($playerValue['position_id'] == 2) {
                        $defenderData[] = $playerValue;
                    }
                    if ($playerValue['position_id'] == 3) {
                        $midfielderData[] = $playerValue;
                    }
                    if ($playerValue['position_id'] == 4) {
                        $forwardData[] = $playerValue;
                    }
                }
                if ($searchData != "Search") {
                    if ($type == "goalkeeper") {
                        $goalkeeperData = $playerQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id' => 1])->orWhereIn('id',$cookiesArray)->with('Team', 'Position')->get();
                    } elseif ($type == 'defender') {
                        $defenderData = $playerQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id' => 2])->orWhereIn('id',$cookiesArray)->with('Team', 'Position')->get();
                    } elseif ($type == 'midfielder') {
                        $midfielderData = $playerQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id' => 3])->orWhereIn('id',$cookiesArray)->with('Team', 'Position')->get();
                    } elseif ($type = 'forward') {
                        $forwardData = $playerQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id' => 4])->orWhereIn('id',$cookiesArray)->with('Team', 'Position')->get();
                    }
                    //pr($goalkeeperData);
                }
                if (!empty($point) || !empty($teamfilter) || !empty($min)) {
                    if ($type == "goalkeeper") {
                        $playerQuery->where('players.position_id', 1);
                        if(!empty($teamfilter)){
                            $playerQuery->where('players.team_id', $teamfilter);
                        }
                        if(!empty($min)){
                            $playerQuery->where('players.sell_price','>=',$min)->where('players.sell_price','<=',$max);
                        }
                        if (!empty($point)) {
                            $playerQuery->orderBy('sum_totalPoints', $point);
                        }
                        $goalkeeperData = $playerQuery->orWhereIn('players.id',$cookiesArray)->with('Team', 'Position')->get();
                    } elseif ($type == 'defender') {
                        
                        $playerQuery->where('players.position_id', 2);
                        if(!empty($teamfilter)){
                            $playerQuery->where('players.team_id', $teamfilter);
                        }
                        if(!empty($min)){
                            $playerQuery->where('players.sell_price','>=',$min)->where('players.sell_price','<=',$max);
                        }
                        if (!empty($point)) {
                            $playerQuery->orderBy('sum_totalPoints', $point);
                        }
                        $defenderData = $playerQuery->orWhereIn('players.id',$cookiesArray)->with('Team', 'Position')->get();
                    } elseif ($type == 'midfielder') {
                        $playerQuery->where('players.position_id', 3);
                        if(!empty($teamfilter)){
                            $playerQuery->where('players.team_id', $teamfilter);
                        }
                        if(!empty($min)){
                            $playerQuery->where('players.sell_price','>=',$min)->where('players.sell_price','<=',$max);
                        }
                        if (!empty($point)) {
                            $playerQuery->orWhereIn('players.id',$cookiesArray)->orderBy('sum_totalPoints', $point);
                        }
                        $midfielderData = $playerQuery->orWhereIn('players.id',$cookiesArray)->with('Team', 'Position')->get();
                    } elseif ($type = 'forward') {
                        $playerQuery->where('players.position_id', 4);
                        if(!empty($teamfilter)){
                            $playerQuery->where('players.team_id', $teamfilter);
                        }
                        if(!empty($min)){
                            $playerQuery->where('players.sell_price','>=',$min)->where('players.sell_price','<=',$max);
                        }
                        if (!empty($point)) {
                            $playerQuery->orderBy('sum_totalPoints', $point);
                        }
                        $forwardData = $playerQuery->orWhereIn('players.id',$cookiesArray)->with('Team', 'Position')->get();
                    }
                }
                return view('users/createteamajax', ['goalkeeperData' => $goalkeeperData, 'defenderData' => $defenderData, 'midfielderData' => $midfielderData, 'forwardData' => $forwardData, 'type' => $type, 'team' => $team, 'request' => $request, 'user_selected_player' => $user_selected_player, 'editId' => $editId]);
            }
            return view('users/createTeam', ['editId' => $editId]);
        }
    }

    public function editSquad(Request $request)
    {
        // echo 'sdfsdf';die;
        if(!empty($request->id)){
            $userTeam = UserTeam::find($request->id);
            return json_decode($userTeam->players,true);
        }

    }

    public function managesquadone(Request $request)
    {
        $selected = is_array($request->selected) ? $request->selected : explode(',', $request->selected);
        $editId = !empty($request->editId) ? $request->editId : '';
        $selectedData = Player::select(['players.*',DB::raw('(select sum(sq.total_points) from squads as sq where sq.player_id=players.id) as sum_totalPoints')])->whereIn('id', $selected)->get();
        

        $currentweekcount = Player::select(['players.*',DB::raw('(select sum(sq.total_points) from squads as sq where sq.player_id=players.id and sq.week_id='.currentWeek().') as cmg_totalpoints')])->join('squads','squads.player_id','=','players.id')->where(['squads.week_id'=>currentWeek()])->whereIn('players.id', $selected)->orderBy('players.position_id')->get();

        
       
            foreach($currentweekcount as $value){
                $playerpointTotal = UserTeam::select([DB::raw('(select count(ut.id) from user_teams as ut where ut.current_week='.currentWeek().' and ut.players like "%'.$value['id'].'%") as gw_pictotal'),DB::raw('(select count(ut.id) from user_teams as ut where ut.players like "%'.$value['id'].'%") as pictotal'),DB::raw('(select count(ut.id) from user_teams as ut where ut.captain = "'.$value['id'].'") as total_cap'),DB::raw('(select count(ut.id) from user_teams as ut where ut.current_week='.currentWeek().' and ut.captain = "'.$value['id'].'") as cgw_cap')])->first()->toArray();
                $value['pictotal']      = $playerpointTotal['pictotal'];
                $value['gw_pictotal']   = $playerpointTotal['gw_pictotal'];
                $value['total_cap']     = $playerpointTotal['total_cap'];
                $value['cgw_cap']       = $playerpointTotal['cgw_cap'];
            }
            

        $user_selected_substitude = $forwardData = $midfielderData = $defenderData = $goalkeeperData = [];
        if (!empty($editId)) {
            $userTeam = UserTeam::find($editId);
            $user_selected_substitude = json_decode($userTeam['substitude'], true);
        }
        foreach ($selectedData as $playerValue) {
            
            if ($playerValue->position_id == 1) {
                $goalkeeperData = $playerValue;
            }
            if ($playerValue->position_id == 2) {
                $defenderData[] = $playerValue;
            }
            if ($playerValue->position_id == 3) {
                $midfielderData[] = $playerValue;
            }
            if ($playerValue->position_id == 4) {
                $forwardData[] = $playerValue;
            }
        }
        
        return view('users/managesquad/managesquadone', ['goalkeeperData' => $goalkeeperData,'currentweekcount'=>$currentweekcount,'defenderData' => $defenderData,'midfielderData' => $midfielderData, 'forwardData' => $forwardData, 'user_selected_substitude' => $user_selected_substitude]);
    }

    public function managesquadtwo(Request $request)
    {
        $selected = is_array($request->selected) ? $request->selected : explode(',', $request->selected);
        $substitude = is_array($request->selectData) ? $request->selectData : explode(',', $request->selectData);
        $editId = !empty($request->editId) ? $request->editId : '';

        
        $selectedData = Player::select(['players.*',DB::raw('(select sum(sq.total_points) from squads as sq where sq.player_id=players.id) as sum_totalPoints')])->whereIn('id', $selected)->get();

        $currentweekcount = Player::select(['players.*',DB::raw('(select sum(sq.total_points) from squads as sq where sq.player_id=players.id and sq.week_id='.currentWeek().') as cmg_totalpoints')])->join('squads','squads.player_id','=','players.id')->where(['squads.week_id'=>currentWeek()])->whereIn('players.id', $selected)->orderBy('players.position_id')->get();

        
       
            foreach($currentweekcount as $value){
                $playerpointTotal = UserTeam::select([DB::raw('(select count(ut.id) from user_teams as ut where ut.current_week='.currentWeek().' and ut.players like "%'.$value['id'].'%") as gw_pictotal'),DB::raw('(select count(ut.id) from user_teams as ut where ut.players like "%'.$value['id'].'%") as pictotal'),DB::raw('(select count(ut.id) from user_teams as ut where ut.captain = "'.$value['id'].'") as total_cap'),DB::raw('(select count(ut.id) from user_teams as ut where ut.current_week='.currentWeek().' and ut.captain = "'.$value['id'].'") as cgw_cap')])->first()->toArray();
                $value['pictotal']      = $playerpointTotal['pictotal'];
                $value['gw_pictotal']   = $playerpointTotal['gw_pictotal'];
                $value['total_cap']     = $playerpointTotal['total_cap'];
                $value['cgw_cap']       = $playerpointTotal['cgw_cap'];
            }
        
        $forwardData = $midfielderData = $defenderData = $goalkeeperData = [];
        $user_selected_captain = '';
        if (!empty($editId)) {
            $userTeam = UserTeam::find($editId);
            $user_selected_captain = $userTeam['captain'];
        }
        foreach ($selectedData as $playerValue) {
            if ($playerValue->position_id == 1) {
                $goalkeeperData = $playerValue;
            }
            if ($playerValue->position_id == 2) {
                $defenderData[] = $playerValue;
            }
            if ($playerValue->position_id == 3) {
                $midfielderData[] = $playerValue;
            }
            if ($playerValue->position_id == 4) {
                $forwardData[] = $playerValue;
            }
        }
        //prr($user_selected_captain);
        return view('users/managesquad/managesquadtwo', ['goalkeeperData' => $goalkeeperData, 'currentweekcount'=>$currentweekcount,'defenderData' => $defenderData, 'midfielderData' => $midfielderData, 'forwardData' => $forwardData, 'substitude' => $substitude, 'user_selected_captain' => $user_selected_captain,'selected'=>$selected]);
    }

    public function managesquadthree(Request $request)
    {
        $selected = is_array($request->selected) ? $request->selected : explode(',', $request->selected);
        $substitude = is_array($request->substitude) ? $request->substitude : explode(',', $request->substitude);
        $finalArray = array_diff($selected, $substitude);
        $editId = !empty($request->editId) ? $request->editId : '';

        $captain = $request->captain;
        $selectedData = Player::select(['players.*',DB::raw('(select sum(sq.total_points) from squads as sq where sq.player_id=players.id) as sum_totalPoints')])->whereIn('id', $selected)->get();
        $captainData = $substitudeData = $playerData = $goalkeeperData = [];
        $user_team_name = '';

        $forwardData = $midfielderData = $defenderData = $goalkeeperData = [];

        $currentweekcount = Player::select(['players.*',DB::raw('(select sum(sq.total_points) from squads as sq where sq.player_id=players.id and sq.week_id='.currentWeek().') as cmg_totalpoints')])->join('squads','squads.player_id','=','players.id')->where(['squads.week_id'=>currentWeek()])->whereIn('players.id', $selected)->orderBy('players.position_id')->get();

        
       
        foreach($currentweekcount as $value){
            $playerpointTotal = UserTeam::select([DB::raw('(select count(ut.id) from user_teams as ut where ut.current_week='.currentWeek().' and ut.players like "%'.$value['id'].'%") as gw_pictotal'),DB::raw('(select count(ut.id) from user_teams as ut where ut.players like "%'.$value['id'].'%") as pictotal'),DB::raw('(select count(ut.id) from user_teams as ut where ut.captain = "'.$value['id'].'") as total_cap'),DB::raw('(select count(ut.id) from user_teams as ut where ut.current_week='.currentWeek().' and ut.captain = "'.$value['id'].'") as cgw_cap')])->first()->toArray();
            $value['pictotal']      = $playerpointTotal['pictotal'];
            $value['gw_pictotal']   = $playerpointTotal['gw_pictotal'];
            $value['total_cap']     = $playerpointTotal['total_cap'];
            $value['cgw_cap']       = $playerpointTotal['cgw_cap'];
        }


        if (!empty($editId)) {
            $userTeam = UserTeam::find($editId);
            $user_team_name = $userTeam['name'];
        }
        foreach ($selectedData as $playerValue) {
            if ($playerValue->position_id == 1) {
                $goalkeeperData = $playerValue;
            }
            if ($playerValue->position_id == 2) {
                $defenderData[] = $playerValue;
            }
            if ($playerValue->position_id == 3) {
                $midfielderData[] = $playerValue;
            }
            if ($playerValue->position_id == 4) {
                $forwardData[] = $playerValue;
            }

            if ($playerValue->id == $captain) {
                $captainData = $playerValue;
                continue;
            }
            if (in_array($playerValue->id, $substitude)) {
                $substitudeData[] = $playerValue;
            }
            if (in_array($playerValue->id, $finalArray)) {
                $playerData[] = $playerValue;
            }
        }
        // p($goalkeeperData);
        // prr($substitude);


        return view('users/managesquad/managesquadthree', ['goalkeeperData' => $goalkeeperData, 'currentweekcount'=>$currentweekcount,'defenderData' => $defenderData, 'midfielderData' => $midfielderData, 'forwardData' => $forwardData,'substitude' => $substitude,'playerData' => $playerData, 'captainData' => $captain, 'substitudeData' => $substitudeData, 'user_team_name' => $user_team_name,'selected'=>$selected]);
    }
}
