<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $posts = Post::latest()->get();

        return view('home', compact('posts'));
    }

    /**
     * Create a post
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return back();
    }
}
