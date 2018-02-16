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
        /**
         * @var Post $posts
         */
        $posts = auth()->user()->homePosts();

        if ($posts->isEmpty()) {

            $posts = auth()->user()->getPosts();
        }

        return view('home', compact('posts'));
    }
}
