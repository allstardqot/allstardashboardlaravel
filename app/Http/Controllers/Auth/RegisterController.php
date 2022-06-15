<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Nationalities;
use App\Models\Team;
use App\Models\Player;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // echo 'register';die;
        // $this->index();
        $this->middleware('guest');
    }

    
    public function showRegistrationForm(){
        // echo 'dflkhsadokf';die;
        $nationlity = Nationalities::select('country')->get();
        $team = Team::select('name')->get();
        $player = Player::select('display_name')->get();
        // print_r($player);die;
        return view("auth.register", compact("nationlity",'team','player'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'user_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country' => ['required', ],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // print_r($data['country_code']);die;
        $user_data =  User::query()->orderByDesc('id')->limit(1)->first();
        // prr();
        // echo 'ASU000'.($user_data->id+1);die;

        $refer_code = 'ASU000'.($user_data->id+1);
       
        return User::create([
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'role_id'=> 3 ,
            'country'=> $data['country'] ,
           'referral_code'=>$refer_code,
            'password' => Hash::make($data['password']),
        ]);

        
    }
}
