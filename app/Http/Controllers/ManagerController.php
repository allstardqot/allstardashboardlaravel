<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\CreatePost;
use Illuminate\Support\Facades\DB;
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
        $cookie = \Cookie::queue(\Cookie::forget('selected_player'));
        \Cookie::queue(\Cookie::forget('step'));
        \Cookie::queue(\Cookie::forget('editId'));
        \Cookie::queue(\Cookie::forget('substitude'));
    }

    public function index(Request $request){
        if($request->comment && $request->postId){
            $commentData=new Comment;
            $commentData->comment=$request->comment;
            $commentData->post_id=$request->postId;
            $commentData->user_id=Auth::user()->id;
            if($commentData->save()){
                return redirect('manager-lounge')->with('message', 'Your comment successfully submitted!');
            }
        }
        $post = CreatePost::select(['create_posts.*',DB::raw('(SELECT count(id) FROM comments as c WHERE c.post_id=create_posts.id) as comment')])->where(['user_id'=>Auth::user()->id])->limit(2)->get();

        $latest = CreatePost::select(['create_posts.*',DB::raw('(SELECT count(id) FROM comments as c WHERE c.post_id=create_posts.id) as comment')])->where(['user_id'=>Auth::user()->id])->limit(2)->orderBy("created_at",'desc')->get();

        $trending = CreatePost::select(['create_posts.*',DB::raw('(SELECT count(id) FROM comments as c WHERE c.post_id=create_posts.id) as comment')])->where(['user_id'=>Auth::user()->id])->orderBy("comment",'desc')->get();

        // /pr($trending);
        return view('users/managerLounge',compact('latest','post','trending'));
    }

    public function store(Request $request){
        $post = new CreatePost;
        $post->user_id    = Auth::user()->id;
        $post->description   = $request->input('description');

        $post->save();
        return back()->with('success','Post created successfully!');
    }
}
