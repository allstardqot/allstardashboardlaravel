<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index(){
        $faq = Faq::select('title','description')->get();
        // print_r($faq);die;

        return view("web.faq",compact('faq'));
    }
}
