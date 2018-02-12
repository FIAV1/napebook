<?php

namespace App\Http\Controllers;


class FriendController extends Controller
{
    /**
     * Show the friendship dashboard.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $friends = auth()->user()->acceptedFriends();

        return view('friendship.show', compact('friends'));
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

        return view('friendship.pendent', compact('friends'));
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

        return view('friendship.request', compact('friends'));
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
