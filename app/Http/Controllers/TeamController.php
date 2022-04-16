<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;


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
        // echo 'sljhf';die;
        return view('users/team');
    }

    public function createTeam(Request $request)
    {
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
                }else{
                    $privateData=$privateQuery->where('pool_name', 'LIKE', '%' . $searchData . '%')->get();
                }
            }
            return view('users/createteamajax',['goalkeeperData'=>$goalkeeperData,'defenderData'=>$defenderData,'midfielderData'=>$midfielderData,'forwardData'=>$forwardData,'type'=>$type]);
        }
        return view('users/createTeam');
    }

    public function managesquadone(){
        return view('users/managesquad/managesquadone');
    }

    public function managesquatwo(){
        return view('users/mangesquad/managesquadthree');
    }
}
