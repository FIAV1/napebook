<?php

namespace App\Http\Controllers;

use App\User;


class FriendController extends Controller
{
    /**
     * Show the friendship dashboard.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $friends = $user->acceptedFriends();

        return view('friendship.index', compact('friends'), compact('user'));
    }

    /**
     * Show the pending friendship request.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function pendent()
    {
        $friends = auth()->user()->pendingFriends();

        return response()->json($friends);
    }

    /**
     * Show the pending friendship request.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function request()
    {
        $friends = auth()->user()->requestFriends();

        return response()->json($friends);
    }

    /**
     * Search between the friendship of the user.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        $friends = auth()->user()->pendingFriend(request('keyword'));

        return view('friendship.search', compact('friends'));
    }
}
