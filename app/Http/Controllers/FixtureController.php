<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use Illuminate\Http\Request;
use App\Models\Week;
use Illuminate\Support\Facades\DB;

class FixtureController extends Controller
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
    public function index(Request $request)
    {
        $weeak=[];
        $fixtureQuery = Fixture::query();
        if(!empty($request->start_fixture) && !empty($request->end_fixture)){
            $fixtureQuery->whereBetween('starting_at', [$request->start_fixture." 00:00:00", $request->end_fixture." 23:59:59"]);
            $weeak=array('starting_at'=>$request->start_fixture,'ending_at'=>$request->end_fixture);
        }else{
            $weeak=Week::find(currentWeek())->toArray();     
            //echo $weeak['starting_at'];die;
            if(!empty($weeak['starting_at']) && !empty($weeak['ending_at'])){
                $fixtureQuery->whereBetween('starting_at', [$weeak['starting_at']." 00:00:00", $weeak['ending_at']." 23:59:59"]);
                $weeak=array('starting_at'=>$weeak['starting_at'],'ending_at'=>$weeak['ending_at']);
            }

        }
        //prr($weeak);
        $fixturedata = $fixtureQuery->with(['teams1','teams2'])->get()->toArray();

        return view('users/fixture',['fixturedata'=>$fixturedata,'weeak'=>$weeak]);
    }
}
