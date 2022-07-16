<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\UserTeam;
use App\Models\UserContest;
use App\Models\Week;
use App\Models\UserPool;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;
use Mail;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Cookie;

class WalletController extends Controller
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
        $otp = rand(1000,9999);
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->user_name;
        $user_mail = Auth::user()->email;
        $user = User::where('id','=',$user_id)->update(['otp' => $otp]);

        if(!isset($_COOKIE['wallet-cookie'])){
            if($user ){
            
       
                Mail::send('users.otpVerify',['user_name'=>$user_name,'otp'=>$otp], function($message) use($user_mail){
                    $message->to($user_mail);
                    $message->from(env('MAIL_FROM_ADDRESS'), env('APP_NAME'));
                    $message->subject('Verify OTP');
                });
           
                return view('users/wallet/index');
            }
            else{
                return redirect('/wallet')->with('message', 'OTP Not Send!');
    
            }
        }else{

            return view('users/wallet/index');
        }
    }

    public function otpverify(Request $request){
        $otp = $request->otp;
        $user_id = Auth::user()->id;
        // return $otp;die;
        $user  = User::where([['otp','=',$otp]])->first();
        if($user){
            
            User::where('id','=',$user_id)->update(['otp' => null]);
            

            return 'Success';
        }
        else{
            return 'Invalid';
        }
    }


    public function withdrawl(Request $request){
        // echo 'success'.$request->amt;die;
        $request_amt = $request->amt;
        $status = '';
        $user_wallet = Auth::user()->wallet;
        $user_id = Auth::user()->id;

        if($request_amt > $user_wallet ){
            $status = 1;
            return $status;
        }
        $left_wallet = $user_wallet - $request_amt;
        $user = User::where('id','=',$user_id)->update(['wallet' => $left_wallet]);
        $status = 0; 

        $payment            = new Payment;
        $payment->user_id   = Auth::user()->id;
        $payment->amount    = $request_amt;
        $payment->type      = 'WITHDRAW REQUEST';
        $payment->status    = 1;
        $payment->transaction_id = uniqid();
        $payment->save();

        return $left_wallet;




    }

   
}
