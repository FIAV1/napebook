<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Show all the users.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();

        return view('test.show', compact('users'));
    }
}
