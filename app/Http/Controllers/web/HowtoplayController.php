<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HowtoplayController extends Controller
{
    public function index(){
        return view("web.howto_play");
    }
}
