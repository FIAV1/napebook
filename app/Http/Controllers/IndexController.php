<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.index');
    }
}
