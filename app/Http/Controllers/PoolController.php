<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\UserPool;
use Illuminate\Support\Facades\Hash;
use Auth;



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
        $user_id    = Auth::user()->id;
        $poolData = UserPool::query()->where(['user_id'=>$user_id])->get();
        // echo 'sljhf';die;
            return view('users/pools/index',['poolData'=>$poolData]);
    }

    public function createPool()
    {
        // echo 'sljhf';die;
        $team       = Team::get();
        return view('users/pools/createpool',['team'=>$team]);
    }

    public function insert(Request $request){
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
