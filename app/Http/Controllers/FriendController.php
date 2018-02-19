<?php

namespace App\Http\Controllers;

use App\User;

class FriendController extends Controller
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
     * Show the user's friends.
     *
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $friends = $user->acceptedFriends();

        return view('friendship.index', compact('friends'), compact('user'));
    }

    /**
     * Show the pending friendship request received by the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function pendent()
    {
        $friends = auth()->user()->pendingFriends();

        return response()->json($friends);
    }

    /**
     * Show the pending friendship request sent by the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function request()
    {
        $friends = auth()->user()->requestFriends();

        return response()->json($friends);
    }
}
