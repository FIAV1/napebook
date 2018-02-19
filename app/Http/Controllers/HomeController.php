<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application timeline.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::homePosts()->limit(2)->get();

        if($posts->isEmpty()) {
            $posts = auth()->user()->posts()->latest()->limit(2)->get();
        }

        return view('home', compact('posts'));
    }

    public function loadHomePosts(Request $request)
    {
        $posts = Post::homePosts()
            ->offset($request->get('offset'))
            ->limit($request->get('limit'))
            ->get();

        return view('post.collection', compact('posts'));
    }
}
