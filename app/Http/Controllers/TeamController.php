<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Team;
use App\Models\UserTeam;
use Auth;


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
        $userTeam = UserTeam::where(['user_id' => Auth::user()->id])->orderBy('user_teams.id', 'DESC')->limit(3)->get()->toArray();

        if (empty($userTeam)) {
            return redirect()->route('create-team')->with('info', 'Please first create team!');
        }

        $mainData = [];
        foreach ($userTeam as $data) {
            $result = [];
            $players = $data['players'];
            $plyArr = json_decode($players, true);

            $result = Player::join('positions', 'positions.id', '=', 'players.position_id')->whereIn('players.id', $plyArr)->orderBy('positions.id', 'ASC')->get()->toArray();
            $result['team_name'] = $data['name'];
            $result['id'] = $data['id'];

            array_push($mainData, $result);
            //$result['team_name']=$data['name'];
        }



        //pr($mainData);
        // $result = Player::join('Position', 'Position.id', '=', 'Player.position_id')->whereIn('id', $plyArr)->get()->toArray();
        // pr($result);


        return view('users/team', compact('mainData', 'userTeam'));
    }

    public function createTeam(Request $request, $editId = null)
    {
        $editId = !empty($request->editId) ? $request->editId : $editId;
        preg_match_all('!\d+!', $editId, $matches);
        if(!empty($editId) && empty($matches[0])){
            return redirect(route("team"));
        }
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
            }
            $userTeam->user_id = Auth::user()->id;
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
            $cost_range = $request->cost_range;
            $type = $request->type;
            $team = Team::pluck('name', 'id');
            if (!empty($searchData)) {
                $user_selected_substitude = $user_selected_player = $goalkeeperData = $defenderData = $midfielderData = $forwardData = [];
                $user_selected_captain = '';

                if (!empty($editId) && UserTeam::find($editId)) {
                    $userTeam = UserTeam::find($editId);
                    $user_selected_player = json_decode($userTeam['players'], true);
                }
                $playerQuery = Player::query();
                $playerData = $playerQuery->select(['players.*'])->with('Team', 'Position')->get();
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
                        $goalkeeperData = $playerQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id' => 1])->with('Team', 'Position')->get();
                    } elseif ($type == 'defender') {
                        $defenderData = $playerQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id' => 2])->with('Team', 'Position')->get();
                    } elseif ($type == 'midfielder') {
                        $midfielderData = $playerQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id' => 3])->with('Team', 'Position')->get();
                    } elseif ($type = 'forward') {
                        $forwardData = $playerQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id' => 4])->with('Team', 'Position')->get();
                    }
                    //pr($goalkeeperData);
                }
                if (!empty($point) || !empty($teamfilter) || !empty($cost_range)) {
                    if ($type == "goalkeeper") {
                        $playerQuery->where('players.position_id', 1);
                        if(!empty($teamfilter)){
                            $playerQuery->where('players.team_id', $teamfilter);
                        }
                        if(!empty($cost_range)){
                            $playerQuery->where('players.sell_price','<',$cost_range);
                        }
                        if (!empty($point)) {
                            $playerQuery->orderBy('total_point', $point);
                        }
                        $goalkeeperData = $playerQuery->with('Team', 'Position')->get();
                    } elseif ($type == 'defender') {
                        $playerQuery->where('players.position_id', 2);
                        if(!empty($teamfilter)){
                            $playerQuery->where('players.team_id', $teamfilter);
                        }
                        if(!empty($cost_range)){
                            $playerQuery->where('players.sell_price','<',$cost_range);
                        }
                        if (!empty($point)) {
                            $playerQuery->orderBy('total_point', $point);
                        }
                        $defenderData = $playerQuery->with('Team', 'Position')->get();
                    } elseif ($type == 'midfielder') {
                        $playerQuery->where('players.position_id', 3);
                        if(!empty($teamfilter)){
                            $playerQuery->where('players.team_id', $teamfilter);
                        }
                        if(!empty($cost_range)){
                            $playerQuery->where('players.sell_price','<',$cost_range);
                        }
                        if (!empty($point)) {
                            $playerQuery->orderBy('total_point', $point);
                        }
                        $midfielderData = $playerQuery->with('Team', 'Position')->get();
                    } elseif ($type = 'forward') {
                        $playerQuery->where('players.position_id', 4);
                        if(!empty($teamfilter)){
                            $playerQuery->where('players.team_id', $teamfilter);
                        }
                        if(!empty($cost_range)){
                            $playerQuery->where('players.sell_price','<',$cost_range);
                        }
                        if (!empty($point)) {
                            $playerQuery->orderBy('total_point', $point);
                        }
                        $forwardData = $playerQuery->with('Team', 'Position')->get();
                    }
                }
                return view('users/createteamajax', ['goalkeeperData' => $goalkeeperData, 'defenderData' => $defenderData, 'midfielderData' => $midfielderData, 'forwardData' => $forwardData, 'type' => $type, 'team' => $team, 'request' => $request, 'user_selected_player' => $user_selected_player, 'editId' => $editId]);
            }
            return view('users/createTeam', ['editId' => $editId]);
        }
    }

    public function managesquadone(Request $request)
    {
        $selected = is_array($request->selected) ? $request->selected : explode(',', $request->selected);
        $editId = !empty($request->editId) ? $request->editId : '';
        $selectedData = Player::query()->whereIn('id', $selected)->get();
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
        //prr($user_selected_substitude);
        return view('users/managesquad/managesquadone', ['goalkeeperData' => $goalkeeperData, 'defenderData' => $defenderData, 'midfielderData' => $midfielderData, 'forwardData' => $forwardData, 'user_selected_substitude' => $user_selected_substitude]);
    }

    public function managesquadtwo(Request $request)
    {
        $selected = is_array($request->selected) ? $request->selected : explode(',', $request->selected);
        $substitude = is_array($request->selectData) ? $request->selectData : explode(',', $request->selectData);
        $editId = !empty($request->editId) ? $request->editId : '';
        $selectedData = Player::query()->whereIn('id', $selected)->get();
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
        //pr($user_selected_captain);
        return view('users/managesquad/managesquadtwo', ['goalkeeperData' => $goalkeeperData, 'defenderData' => $defenderData, 'midfielderData' => $midfielderData, 'forwardData' => $forwardData, 'substitude' => $substitude, 'user_selected_captain' => $user_selected_captain,'selected'=>$selected]);
    }

    public function managesquadthree(Request $request)
    {
        $selected = is_array($request->selected) ? $request->selected : explode(',', $request->selected);
        $substitude = is_array($request->substitude) ? $request->substitude : explode(',', $request->substitude);
        $finalArray = array_diff($selected, $substitude);
        $editId = !empty($request->editId) ? $request->editId : '';

        $captain = $request->captain;
        $selectedData = Player::query()->whereIn('id', $selected)->with('position')->get();
        $captainData = $substitudeData = $playerData = $goalkeeperData = [];
        $user_team_name = '';

        $forwardData = $midfielderData = $defenderData = $goalkeeperData = [];


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
        return view('users/managesquad/managesquadthree', ['goalkeeperData' => $goalkeeperData, 'defenderData' => $defenderData, 'midfielderData' => $midfielderData, 'forwardData' => $forwardData,'substitude' => $substitude,'playerData' => $playerData, 'captainData' => $captain, 'substitudeData' => $substitudeData, 'user_team_name' => $user_team_name,'selected'=>$selected]);
    }
}
