<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagelayoutController extends Controller
{
    public function termsCondition(){
        return view("web.terms_condition");
    }

    public function amlPolicy(){
        return view("web.aml_policy");
    }

    public function kycPolicy(){
        return view("web.kyc_policy");
    }

    public function gamingPolicy(){
        return view("web.gaming_policy");
    }
}
