<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Nationalities;
use App\Models\Team;
use App\Models\Player;
use Auth;



class ProfileController extends Controller
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
        $user = Auth::user();
        // echo 'sljhf';die;
        return view('users/profile/profile',['user'=>$user]);
    }

    public function edit(){
        $user = Auth::user();
        $nationlity = Nationalities::select('country')->get();
        $team       = Team::select('name')->get();
        $player     = Player::select('display_name')->get();
        $code = ['+93','+355','+213','+1-684','+376','+244','+1-264','+672','+1-268','+54','+374','+297','+247','+61','+672','+43','+994','+1-242','+973','+880','+1-246','+1-268','+375','+32','+501','+229','+1-441','+975','+591','+387','+267','+55','+1-284','+673','+359','+226','+257','+855','+237','+1','+238','+1-345','+236','+235','+64','+56','+86','+61-8','+61','+57','+269','+242','+243','+682','+506','+225','+385','+53','+5399','+599','357','+420','+45','+246','+253','+1-767','+1-809','+1-829','+670','+593','+56','+20','+503','+8812','+8813','+88213','+240','+291','+372','+251','+220','+49','+299','+354','+91','+62','+98','+964','+353','+972','+39','+1-876','+81','+962','7','+850','+965','+961','+231','+265','+60','+960','+52','+976','+95','+64','+968','+92','+51','+63','+48','+351','+974','+966','+65','+34','+94','+268','+46','+963','+886','+992','+255','+66','+90','+256','+380','+971','+44','+681','+967','+260','+263','+255'
    
    ];
        return view('users/profile/edit', compact("nationlity",'team','player','user','code'));
    }


    public function update(Request $request){

        // print_r($request->input());die;
        $user = Auth::user();

        $user->user_name       = $request->input('user_name');
        $user->email          = $request->input('email');
        $user->phone    = $request->input('phone');
        $user->gender    = $request->input('gender');
        $user->address    = $request->input('address');
        $user->pincode    = $request->input('pincode');
        $user->country    = $request->input('country');
        $user->country_code    = $request->input('country_code');
        $user->team_id    = $request->input('team_id');
        $user->city                 = $request->input('city');

        $user->save();

        // /*
        //     Return a response that the user was updated successfully.
        // */
        return redirect('/profile')->with('message', 'Your Profile Successfully Updated!');
    }
}
