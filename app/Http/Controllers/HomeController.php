<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPool;
use App\Models\Team;
use App\Models\UserTeam;
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
            return view('users/homehtml',['publicData'=>$publicData,'privateData'=>$privateData,'type'=>$type,'team'=>$team]);
        }
        // echo 'sljhf';die;
        return view('users/home',['publicData'=>$publicData,'privateData'=>$privateData,'type'=>$type,'team'=>$team]);
    }
}
