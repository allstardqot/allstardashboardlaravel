<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagelayoutController extends Controller
{
    public function termsCondition(){
        return view("web.terms_condition");
    }

    public function cookiePolicy(){
        return view("web.cookie_policy");
    }

    public function privacyPolicy(){
        return view("web.privacy_policy");
    }

   
}
