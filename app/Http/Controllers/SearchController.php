<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
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
     * Search Users in Napebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = request('query');

        if($query == null){
            return redirect()->route('home');
        }

        $users = auth()->user()->search($query);

        return view('search.search', compact('users'));
    }

}
