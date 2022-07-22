<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserContest;
use App\Models\UserTeam;
use Illuminate\Http\Request;
use App\Models\Nationalities;
use App\Models\Team;
use App\Models\Player;
use Auth;
use App\Models\Payment;
use Mail;
use Illuminate\Support\Facades\Storage;



class ProfileController extends Controller
{

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
        $usercontest    = UserContest::where(['user_id'=>$user->id])->count();
        $totalCoin      = User::where(['id'=>$user->id])->get()->first();
        $totalCoins     =   !empty($totalCoin['wallet'])?$totalCoin['wallet']:0;
        $winningContest = UserContest::where([['user_id',$user->id],['winning_distribute',1],['rank',[1,2]]])->get()->count();
        $fantasyPoint = UserTeam::where([['user_id',$user->id]])->sum('total_points');

        return view('users/profile/profile',['usercontest'=>$usercontest,'user'=>$user,'totalCoins'=>$totalCoins,'winningContest'=>$winningContest,'fantasyPoint'=>$fantasyPoint]);
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
        $data=[];

        //prr($request->file('profile_image'));
        $user = Auth::user();
        if($request->file('profile_image')){

            $file= $request->file('profile_image');
            //echo $file."tttt";die;
            if(auth()->user()->profile_image){
                unlink(public_path('profileImage/').auth()->user()->profile_image);
                //echo "finee.<br>".auth()->user()->profile_image;die;
            }

            $filename= time().'.'.$file->extension();
            $file-> move(public_path('profileImage'), $filename);
            $user->profile_image= $filename;
        }
        //echo "fineeeee";die;

        $user->user_name    = $request->input('user_name');
        $user->email        = $request->input('email');
        $user->phone        = $request->input('phone');
        $user->gender       = $request->input('gender');
        $user->address      = $request->input('address');
        $user->dob          = $request->input('dob');
        $user->pincode      = $request->input('pincode');
        $user->country      = $request->input('country');
        $user->country_code = $request->input('country_code');
        $user->team_id      = $request->input('team_id');
        $user->city         = $request->input('city');
        $user->wallet_address  = $request->input('wallet_address');

        $user->save();

        // /*
        //     Return a response that the user was updated successfully.
        // */
        return redirect('/profile')->with('message', 'Your Profile Successfully Updated!');
    }

    public function send_invition(Request $request){

        $referal      = Auth::user()->referral_code;
        $user_name      = Auth::user()->user_name;

        $email_name     = 'USER INVITE';
        $email_template =  emailTemplate($email_name);
        $subject = $email_template->subject;

        $link  = '<a href="'. url("register",$referal) .'">Sign Up</a>';

        $message1	=	str_replace(['{{USER_NAME}}','{{LINK}}'],[ucfirst($user_name),$link],$email_template->template);
        // print_r($message1);die;

        Mail::send('users.invition',['token' => $request->token,'referal'=>$referal,'message1'=>$message1], function($message) use($request,$subject){
            $message->to($request->email);
            $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
            $message->subject($subject);
        });
        return 'Success';

    }

    public function transection(){

        $user_id = Auth::user()->id;
        $transection = Payment::where(['user_id'=>$user_id])->latest('payments.id')->paginate(10);
        // $transection= Payment::paginate(10);
        // prr($transection);
        return view('users/profile/transection',compact('transection'));
    }

    public function save_wallet_address(Request $request) {
        $user = Auth::user();
        $user->wallet_address = $request->input('wallet_address');
        $user->save();
        return 'Success';
    }

    public function update_wallet(Request $request) {

        $user = Auth::user();
        $type = $request->input('type');

        if( $type == 'add' ) {
            $user->wallet += $request->input('token_value');
        } else {
            $user->wallet -= $request->input('token_value');
        }

        $user->save();
        return 'Success';
    }

    public function get_wallet(Request $request) {
        return Auth::user()->wallet;
    }

}
