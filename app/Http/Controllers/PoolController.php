<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\UserContest;
use App\Models\UserPool;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\DB;

class PoolController extends Controller
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
        //echo currentWeek();die;
        $user_id    = Auth::user()->id;
        //$poolData = UserPool::query()->where(['user_id'=>$user_id])->get();
        $poolQuery=UserContest::join('user_pools','user_pools.id','=','pool_id')->join('user_teams','user_teams.id','=','user_team_id')->where('user_contests.user_id',$user_id)->select(['user_pools.*','user_contests.user_id','user_teams.week',DB::raw('(select count(uc.id) from user_contests as uc where uc.pool_id=user_pools.id) as joined')])->get();
        $upcomingPool=$livePool=$completePool=[];
        foreach($poolQuery as $poolValue){
            if($poolValue['week']==nextWeek()){
                $upcomingPool[]=$poolValue;
            }
            if($poolValue['week']==currentWeek()){
                $livePool[]=$poolValue;
            }
            if($poolValue['week']<currentWeek()){
                $completePool[]=$poolValue;
            }
        }
            return view('users/pools/index',['upcomingPool'=>$upcomingPool,'livePool'=>$livePool,'completePool'=>$completePool]);
    }

    public function createPool()
    {
        // echo 'sljhf';die;
        $team       = Team::get();
        return view('users/pools/createpool',['team'=>$team]);
    }

    public function insert(Request $request){
        request()->validate([
            'pool_name' => 'required',
            'pool_type' => 'required',
            'max_participants' => 'required|numeric',
            'entry_fees' => 'required|numeric',
        ]);
        if($request->pool_type==1){
            request()->validate([
                'pool_name' => 'required',
                'pool_type' => 'required',
                'max_participants' => 'required|numeric',
                'entry_fees' => 'required|numeric',
                'poolpassword' => 'required',
            ]);
        }
        $pool = new UserPool;
        $pool->user_id    = Auth::user()->id;
        $pool->pool_name   = $request->input('pool_name');
        $pool->pool_type   = $request->input('pool_type');
        $pool->max_participants = $request->input('max_participants');
        // $pool->team_id = $request->input('team_id');
        if($request->input('pool_type') == '1'){
            $pool->password =  Hash::make($request->input('password'));
        }
        $pool->entry_fees =  $request->input('entry_fees');
        $pool->save();
        return view('users/pools/poolcreated',['pool_name'=>$request->input('pool_name'),'entry_fees'=>$request->input('entry_fees')]);
        // return redirect()->back()->with('status','Student Added Successfully');

    }
}
