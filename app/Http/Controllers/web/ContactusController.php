<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\EnquiryDetail;
use App\Mail\UserEmail;
use Mail;



class ContactusController extends Controller
{
    public function index(){
        return view("web.contact_us");
    }

    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', ],
            'message' => ['required', 'string'],
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        // echo 'sdfsdf';die;
        // print_r($request->email);die; 
        $user =$request->email; 
        Mail::to($user)->send(new UserEmail($user));
        $enquiry = new EnquiryDetail;
        $enquiry->name = $request->fname;
        $enquiry->email = $user;
        $enquiry->message = $request->message;
        $enquiry->save();
        return redirect('/')->with('message', 'Thanks For Submission!');

        
    }
}
