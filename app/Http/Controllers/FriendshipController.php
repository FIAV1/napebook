<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
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

        return view('friendship.show',$friends);
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

        return view('friendship.show',$friends);
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

        return view('friendship.show',$friends);
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

        return view('friendship.search',$friends);
    }

    /**
     * Store a unaccepted friendship .
     *
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
