<?php

namespace App\Http\Controllers;


class FriendshipController extends Controller
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
     * Store a unaccepted friendship
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
     * Update and accept a friendship
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //Accept the friendship request
        auth()->user()->acceptFriendship(request('friend_id'));

        return back();

    }

    /**
     * Delete a friendship or a friendship request (accepted or not)
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //Deny the friendship request
        auth()->user()->deleteFriendship(request('friend_id'));

        return back();

    }
}
