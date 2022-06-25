<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\UserTeam;
use App\Models\UserContest;
use App\Models\Week;
use App\Models\UserPool;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Cookie;

class WalletController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $cookie = \Cookie::queue(\Cookie::forget('selected_player'));
        \Cookie::queue(\Cookie::forget('step'));
        \Cookie::queue(\Cookie::forget('editId'));
        \Cookie::queue(\Cookie::forget('substitude'));

        
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        
        

            return view('users/wallet/index');
    }

    public function createPool()
    {
       
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
                'password' => 'required',
                'team_id'=>'required'
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
        if($request->input('pool_type') == '1' && $pool->save() ){
            $contest = new UserContest;
            $contest->user_id    = Auth::user()->id;
            $contest->pool_id    = $pool->id;
            $contest->user_team_id = $request->input('team_id');
            $contest->save();
        }
        return view('users/pools/poolcreated',['pool_name'=>$request->input('pool_name'),'entry_fees'=>$request->input('entry_fees')]);
        // return redirect()->back()->with('status','Student Added Successfully');

    }
}
