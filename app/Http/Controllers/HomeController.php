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
     * @TODO logica per stampa post utenti amici
     */
    public function index()
    {
        $posts = Post::latest()->get();

        return view('home', compact('posts'));
    }
}
