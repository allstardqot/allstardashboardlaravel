<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Nationalities;
use App\Models\Team;
use Mail;
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

    
    public function showRegistrationForm($referal=null){
        // echo $referal;die;
        $nationlity = Nationalities::select('country')->get();
        $team = Team::select('name')->get();
        $player = Player::select('display_name')->get();
        // print_r($player);die;
        return view('auth.register', ["nationlity"=>$nationlity,'team'=>$team,'player'=>$player,'referal'=>$referal]);
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
        // prr();referal_id
        $user_id = '';
        if(!empty($data['referal_code'])){
            $user = User::where(['referral_code'=>$data['referal_code']])->first();
            // prr($user);
            if(empty($user)){
                session()->flash('error', 'Plz Enter Valid Referal Code!');
                // return redirect('register')->with('info','Plz Enter Valid Referal Code!');
                // return redirect()->route('register');
            }else{

                $user->wallet = $user->wallet + 100;
                $user->save();
                $user_id = $user->id;
            }
        }
        
        
        // echo 'ASU000'.($user_data->id+1);die;
        // prr($user->id);
        $refer_code = 'ASU000'.($user_data->id+1);
        //prr($data);
        $res = $this->reCaptcha($data['g-recaptcha-response']);
        //prr($res);
        if($res['success']){
            Mail::send('auth.register-email', ['user' => $data['user_name']], function($message) use($data){
                $message->to($data['email']);
                $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
                $message->subject('Welcome Email');
            });
            return User::create([
                'user_name' => $data['user_name'],
                'email' => $data['email'],
                'role_id'=> 3 ,
                'country'=> $data['country'] ,
            'referral_code'=>$refer_code,
            'referal_id'=>$user_id,
                'password' => Hash::make($data['password']),
            ]);
        }else{
            
            $this->showRegistrationForm();
            //return false;
        }

        
    }

    public function reCaptcha($recaptcha){
        $secret = "6LctDc8gAAAAAJkzKDsNSVuuFzdwDTKcklRGaoN-";
        $ip = $_SERVER['REMOTE_ADDR'];
      
        $postvars = array("secret"=>$secret, "response"=>$recaptcha, "remoteip"=>$ip);
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
        $data = curl_exec($ch);
        curl_close($ch);
      
        return json_decode($data, true);
      }
}
