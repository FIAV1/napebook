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

        $posts = Post::homePosts(0, 10);

        if ($posts->isEmpty()) {

            $posts = auth()->user()->profilePosts(0, 10);
        }

        return view('home', compact('posts'));
    }

}
