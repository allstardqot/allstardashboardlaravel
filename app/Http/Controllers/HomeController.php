<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPool;
use App\Models\Team;


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
        $team = Team::get();
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

    public function news()
    {
        // echo 'sljhf';die;
        return view('users/news');
    }
}
