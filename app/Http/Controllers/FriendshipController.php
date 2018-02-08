<?php

namespace App\Http\Controllers;


class FriendshipController extends Controller
{
    /**
     * Store a unaccepted friendship .
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        //Store a new friendship request
        auth()->user()->addFriendship(request('friend_id'));

        return back();
    }

    /**
     * Update and accept a friendship .
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //Accept the friendship request
        auth()->user()->acceptFriendship(request('friendship_id'));

        return back();

    }

    /**
     *Delete a friendship or a friendship request (accepted or not)     *
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //Accept the friendship request
        auth()->user()->deleteFriendship(request('friendship_id'));

        return back();

    }
}
