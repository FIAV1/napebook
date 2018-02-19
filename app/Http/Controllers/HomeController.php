<?php

namespace App\Http\Controllers;

use App\Post;

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
        $posts = Post::homePosts()->limit(10)->get();

        if ($posts->isEmpty()) {
            $posts = auth()->user()->posts()->latest()->limit(10)->get();
        }

        return view('home', compact('posts'));
    }

}
