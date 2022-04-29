<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
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

    public function index()
    {
        $newsdata=News::query()->orderByDesc('news_created_at')->limit(5)->get();
        return view('users/news',['newsdata'=>$newsdata]);

    }
}
