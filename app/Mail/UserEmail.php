<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Auth;

class UserEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $referral_code    = Auth::user()->referral_code;
        // $message = $referral_code;
        return $this->subject('Mail from All Star')
                    ->view('emails.userEmail',['user'=>$this->user]);
    }
}
