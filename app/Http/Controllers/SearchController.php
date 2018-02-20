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
     * Search users in Napebook.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->input('query');

        if (strcmp($query, 'easteregg') == 0) {

            return view('search.easteregg');
        }

        if($query == null){
            return redirect()->route('home');
        }

        $users = auth()->user()->search($query);

        return view('search.search', compact('users'));
    }

}
