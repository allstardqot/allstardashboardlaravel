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
        $post = CreatePost::select(['create_posts.*',DB::raw('(SELECT count(id) FROM comments as c WHERE c.post_id=create_posts.id) as comment')])->where(['user_id'=>Auth::user()->id,'status'=>1])->limit(2)->get();

        $latest = CreatePost::select(['create_posts.*',DB::raw('(SELECT count(id) FROM comments as c WHERE c.post_id=create_posts.id) as comment')])->where('status',1)->limit(2)->orderBy("created_at",'desc')->get();

        // $trending = CreatePost::select(['create_posts.*',DB::raw('(SELECT count(id) FROM comments as c WHERE c.post_id=create_posts.id) as comment')])->where(['user_id'=>Auth::user()->id])->orderBy("comment",'desc')->get();
        $trending = CreatePost::select(['create_posts.*',DB::raw('(SELECT count(id) FROM comments as c WHERE c.post_id=create_posts.id) as comment')])->where('status',1)->orderBy("comment",'desc')->get();
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

    public function showcomment(Request $request){
        $id = $request->id;
        // echo $id;die;
        $comments = Comment::join('users','users.id','=','comments.user_id')->where('comments.post_id',$id)->get();
        $html = '';
        $id =1;
        if(!empty($comments)){
            foreach($comments as $data){
                $html .= '<tr>
                    <th scope="row">'. $id.'</th>
                    <td>'.strtoupper( $data->comment).'</td>
                    <td>'.strtoupper( $data->user_name).'</td>
                  </tr>';

            $id++;
            }
        }else{
            $html = '<span >No Comment!</span>';
        }
        
        return $html;


    }
}
