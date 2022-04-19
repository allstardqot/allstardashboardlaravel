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
        return view('users/profile/edit', compact("nationlity",'team','player','user'));
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
