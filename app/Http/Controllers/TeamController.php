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
        $userTeam = UserTeam::where(['user_id'=>Auth::user()->id])->orderBy('user_teams.id','DESC')->limit(3)->get()->toArray();

        if(empty($userTeam)){
            return redirect()->route('create-team')->with('info','plz first create team!');
        }

            $mainData = [];
        foreach($userTeam as $data){
            $result=[];
            $players = $data['players'];
            $plyArr = json_decode($players,true);

            $result = Player::join('positions','positions.id','=','players.position_id')->whereIn('players.id', $plyArr)->orderBy('positions.id','ASC')->get()->toArray();
            $result['team_name']=$data['name'];
            $result['id']=$data['id'];
            
            array_push($mainData,$result);
            //$result['team_name']=$data['name'];
        }



         //pr($mainData);
        // $result = Player::join('Position', 'Position.id', '=', 'Player.position_id')->whereIn('id', $plyArr)->get()->toArray();
        // pr($result);


        return view('users/team',compact('mainData','userTeam'));
    }

    public function editteam( Request $request,$id=null){
        $userTeam = UserTeam::where(['id'=>$id])->get();
        if(!empty($request->selected) && !empty($request->teamName)){
            $selected=is_array($request->selected)?$request->selected:explode(',',$request->selected);
            $substitude=is_array($request->substitude)?$request->substitude:explode(',',$request->substitude);
            //$finalPlay=array_diff($selected,$substitude);
            $captain=$request->captain;
            // if (($key = array_search($captain, $finalPlay)) !== false) {
            //     unset($finalPlay[$key]);
            // }
            $teamName=$request->teamName;
            $userTeam = new UserTeam;
            $userTeam->user_id=Auth::user()->id;
            $userTeam->captain=$captain;
            $userTeam->substitude=json_encode($substitude);
            $userTeam->players=json_encode($selected);
            $userTeam->name=$teamName;
            if($userTeam->save()){
                return true;
            }

        }else{
            $searchData=$request->searchData;
            $type=$request->type;

            $goalkeeperQuery=Player::query();
            $goalkeeperData=$goalkeeperQuery->where(['position_id'=>1])->with('Team')->get();

            $defenderQuery=Player::query();
            $defenderData=$defenderQuery->where(['position_id'=>2])->with('Team')->get();

            $midfielderQuery=Player::query();
            $midfielderData=$midfielderQuery->where(['position_id'=>3])->with('Team')->get();
            $forwardQuery=Player::query();
            $forwardData=$forwardQuery->where(['position_id'=>4])->with('Team')->get();
            if(!empty($searchData)){
                if($searchData!="Search"){
                    if($type=="goalkeeper"){
                        $goalkeeperData=$goalkeeperQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id'=>1])->with('Team')->get();
                    }elseif($type=='defender'){
                        $defenderData=$defenderQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id'=>2])->with('Team')->get();
                    }elseif($type=='midfielder'){
                        $midfielderData=$midfielderQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id'=>3])->with('Team')->get();
                    }elseif($type='forward'){
                        $forwardData=$forwardQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id'=>4])->with('Team')->get();
                    }
                }
                //pr($goalkeeperData);
                return view('users/createteamajax',['goalkeeperData'=>$goalkeeperData,'defenderData'=>$defenderData,'midfielderData'=>$midfielderData,'forwardData'=>$forwardData,'type'=>$type]);
            }
            return view('users/createTeam');
        }


    }

    public function createTeam(Request $request)
    {
        if(!empty($request->selected) && !empty($request->teamName)){
            $selected=is_array($request->selected)?$request->selected:explode(',',$request->selected);
            $substitude=is_array($request->substitude)?$request->substitude:explode(',',$request->substitude);
            //$finalPlay=array_diff($selected,$substitude);
            $captain=$request->captain;
            // if (($key = array_search($captain, $finalPlay)) !== false) {
            //     unset($finalPlay[$key]);
            // }
            $teamName=$request->teamName;
            $userTeam = new UserTeam;
            $userTeam->user_id=Auth::user()->id;
            $userTeam->captain=$captain;
            $userTeam->substitude=json_encode($substitude);
            $userTeam->players=json_encode($selected);
            $userTeam->name=$teamName;
            if($userTeam->save()){
                return true;
            }

        }else{
            $searchData=$request->searchData;
            $point=$request->point;
            $teamfilter=$request->team;
            $type=$request->type;
            $team = Team::pluck('name','id');
            if(!empty($searchData)){
                $playerQuery=Player::query();
                $goalkeeperData=$defenderData=$midfielderData=$forwardData=[];
                $playerData=$playerQuery->join('squads as s','s.player_id','=','players.id')->select(['players.*','s.total_points as total_point'])->with('Team','Position')->get();
                foreach($playerData as $playerValue){
                    if($playerValue['position_id']==1){
                        $goalkeeperData[]=$playerValue;
                    }
                    if($playerValue['position_id']==2){
                        $defenderData[]=$playerValue;
                    }
                    if($playerValue['position_id']==3){
                        $midfielderData[]=$playerValue;
                    }
                    if($playerValue['position_id']==4){
                        $forwardData[]=$playerValue;
                    }
                }
                if($searchData!="Search"){
                    if($type=="goalkeeper"){
                        $goalkeeperData=$playerQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id'=>1])->with('Team','Position')->get();
                    }elseif($type=='defender'){
                        $defenderData=$playerQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id'=>2])->with('Team','Position')->get();
                    }elseif($type=='midfielder'){
                        $midfielderData=$playerQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id'=>3])->with('Team','Position')->get();
                    }elseif($type='forward'){
                        $forwardData=$playerQuery->where('fullname', 'LIKE', '%' . $searchData . '%')->where(['position_id'=>4])->with('Team','Position')->get();
                    }
                    //pr($goalkeeperData);
                }
                if(!empty($point) || !empty($teamfilter)){
                    if($type=="goalkeeper"){
                        if(!empty($point) && !empty($teamfilter)){
                            $goalkeeperData=$playerQuery->where([['players.position_id',1],['players.team_id',$teamfilter]])->with('Team','Position')->orderBy('total_point',$point)->get();
                        }elseif(!empty($teamfilter)){
                            $goalkeeperData=$playerQuery->where([['players.position_id',1],['players.team_id',$teamfilter]])->with('Team','Position')->get();
                        }elseif(!empty($point)){
                            $goalkeeperData=$playerQuery->where(['players.position_id'=>1])->with('Team','Position')->orderBy('total_point',$point)->get();
                        }
                    }elseif($type=='defender'){
                        if(!empty($point) && !empty($teamfilter)){
                            $defenderData=$playerQuery->where([['players.position_id',2],['players.team_id',$teamfilter]])->with('Team','Position')->orderBy('total_point',$point)->get();
                        }elseif(!empty($teamfilter)){
                            $defenderData=$playerQuery->where([['players.position_id',2],['players.team_id',$teamfilter]])->with('Team','Position')->get();
                        }elseif(!empty($point)){
                            $defenderData=$playerQuery->where(['players.position_id'=>2])->with('Team','Position')->orderBy('total_point',$point)->get();
                        }
                        //$defenderData=$playerQuery->where(['position_id'=>2])->orderBy('total_point',$point)->with('Team','Position')->get();
                    }elseif($type=='midfielder'){
                        if(!empty($point) && !empty($teamfilter)){
                            $midfielderData=$playerQuery->where([['players.position_id',3],['players.team_id',$teamfilter]])->with('Team','Position')->orderBy('total_point',$point)->get();
                        }elseif(!empty($teamfilter)){
                            $midfielderData=$playerQuery->where([['players.position_id',3],['players.team_id',$teamfilter]])->with('Team','Position')->get();
                        }elseif(!empty($point)){
                            $midfielderData=$playerQuery->where(['players.position_id'=>3])->with('Team','Position')->orderBy('total_point',$point)->get();
                        }
                        //$midfielderData=$playerQuery->where(['position_id'=>3])->orderBy('total_point',$point)->with('Team','Position')->get();
                    }elseif($type='forward'){
                        if(!empty($point) && !empty($teamfilter)){
                            $forwardData=$playerQuery->where([['players.position_id',4],['players.team_id',$teamfilter]])->with('Team','Position')->orderBy('total_point',$point)->get();
                        }elseif(!empty($teamfilter)){
                            $forwardData=$playerQuery->where([['players.position_id',4],['players.team_id',$teamfilter]])->with('Team','Position')->get();
                        }elseif(!empty($point)){
                            $forwardData=$playerQuery->where(['players.position_id'=>4])->with('Team','Position')->orderBy('total_point',$point)->get();
                        }
                        $forwardData=$playerQuery->where(['position_id'=>4])->orderBy('total_point',$point)->with('Team','Position')->get();
                    }
                }

                return view('users/createteamajax',['goalkeeperData'=>$goalkeeperData,'defenderData'=>$defenderData,'midfielderData'=>$midfielderData,'forwardData'=>$forwardData,'type'=>$type,'team'=>$team,'request'=>$request]);
            }
            return view('users/createTeam');
        }
    }

    public function managesquadone(Request $request){
        $selected=is_array($request->selected)?$request->selected:explode(',',$request->selected);
        $selectedData=Player::query()->whereIn('id',$selected)->get();
        $forwardData=$midfielderData=$defenderData=$goalkeeperData=[];
        foreach($selectedData as $playerValue){
            if($playerValue->position_id==1){
                $goalkeeperData=$playerValue;
            }
            if($playerValue->position_id==2){
                $defenderData[]=$playerValue;
            }
            if($playerValue->position_id==3){
                $midfielderData[]=$playerValue;
            }
            if($playerValue->position_id==4){
                $forwardData[]=$playerValue;
            }
        }
        return view('users/managesquad/managesquadone',['goalkeeperData'=>$goalkeeperData,'defenderData'=>$defenderData,'midfielderData'=>$midfielderData,'forwardData'=>$forwardData]);
    }

    public function managesquadtwo(Request $request){
        $selected=is_array($request->selected)?$request->selected:explode(',',$request->selected);
        $substitude=is_array($request->selectData)?$request->selectData:explode(',',$request->selectData);

        $selectedData=Player::query()->whereIn('id',$selected)->get();
        $forwardData=$midfielderData=$defenderData=$goalkeeperData=[];
        foreach($selectedData as $playerValue){
            if($playerValue->position_id==1){
                $goalkeeperData=$playerValue;
            }
            if($playerValue->position_id==2){
                $defenderData[]=$playerValue;
            }
            if($playerValue->position_id==3){
                $midfielderData[]=$playerValue;
            }
            if($playerValue->position_id==4){
                $forwardData[]=$playerValue;
            }
        }
        return view('users/managesquad/managesquadtwo',['goalkeeperData'=>$goalkeeperData,'defenderData'=>$defenderData,'midfielderData'=>$midfielderData,'forwardData'=>$forwardData,'substitude'=>$substitude]);
    }

    public function managesquadthree(Request $request){
        $selected=is_array($request->selected)?$request->selected:explode(',',$request->selected);
        $substitude=is_array($request->substitude)?$request->substitude:explode(',',$request->substitude);
        $finalArray=array_diff($selected,$substitude);

        $captain=$request->captain;
        $selectedData=Player::query()->whereIn('id',$selected)->with('position')->get();
        $captainData=$substitudeData=$playerData=$goalkeeperData=[];
        foreach($selectedData as $playerValue){
            if($playerValue->id==$captain){
                $captainData=$playerValue;
                continue;
            }
            if(in_array($playerValue->id,$substitude)){
                $substitudeData[]=$playerValue;
            }
            if(in_array($playerValue->id,$finalArray)){
                $playerData[]=$playerValue;
            }
        }
        return view('users/managesquad/managesquadthree',['playerData'=>$playerData,'captainData'=>$captainData,'substitudeData'=>$substitudeData]);
    }
}
