<?php

namespace App\Http\Controllers;

use App\Models\Fixture;
use Illuminate\Http\Request;
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
        $fixtureQuery = Fixture::query();
        if(!empty($request->start_fixture) && !empty($request->end_fixture)){
            $fixtureQuery->whereBetween('starting_at', [$request->start_fixture." 00:00:00", $request->end_fixture." 23:59:59"]);
        }
        $fixturedata = $fixtureQuery->with(['teams1','player1','teams2','player2'])->get()->toArray();
        //pr($fixturedata);
        return view('users/fixture',['fixturedata'=>$fixturedata]);
    }
}
