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
        }
        $fixturedata = $fixtureQuery->with(['teams1','teams2'])->get()->toArray();

        return view('users/fixture',['fixturedata'=>$fixturedata,'weeak'=>$weeak]);
    }
}
