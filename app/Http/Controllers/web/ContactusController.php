<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function index(){
        return view("web.contact_us");
    }

    public function insert(Request $request){
        print_r($request);die;

    }
}
