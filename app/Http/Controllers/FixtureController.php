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
        $fixturedata = Fixture::with(['teams1','player1','teams2','player2'])->get()->toArray();
        //pr($fixturedata);
        return view('users/fixture',['fixturedata'=>$fixturedata]);
    }
}
