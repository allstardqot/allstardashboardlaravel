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
    public function index()
    {
        $fixturedata = Fixture::select(['fixtures.*',DB::raw('(SELECT short_code FROM teams WHERE teams.id=fixtures.localteam_id) as localteam_name'),DB::raw('(SELECT short_code FROM teams WHERE teams.id=fixtures.visitorteam_id) as visitorteam_name')])->get()->toArray();
        return view('users/fixture',['fixturedata'=>$fixturedata]);
    }
}
