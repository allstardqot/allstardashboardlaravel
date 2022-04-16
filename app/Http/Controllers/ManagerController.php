<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreatePost;
use Auth;

class ManagerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $post = CreatePost::where(['user_id'=>Auth::user()->id])->get();
        // pr($post);
        return view('users/managerLounge',compact('post'));
    }

    public function store(Request $request){

        $post = new CreatePost;
        $post->user_id    = Auth::user()->id;
        $post->description   = $request->input('description');
       
        $post->save();
        return back()->with('success','Post created successfully!');
        

    }
}
