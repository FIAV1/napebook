<?php

namespace App\Http\Controllers;

use App\User;
use App\Notifications\FriendshipAccepted;
use App\Notifications\FriendshipRequest;

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

        $user = User::where('id', request('friend_id'))->firstOrFail();
        $requestor = auth()->user();


        if ($requestor->id == $user->id) {

            return back()->withError("Non puoi diventare amico di te stesso");
        }

        if (!$requestor->isFriendOf($user->id)) {

            $requestor->addFriendship($user->id);

            /**
             * Sending a notification to te followed user
             * We could call the notify method on a User model because it is already using the Notifiable trait.
             * Any model you want to notify should be using it to get access to the notify method.
             */
            $user->notify(new FriendshipRequest($requestor));

            return back();

        }

        return back()->withError("Sei già amico di {$user->name}");

    }

    /**
     * Update and accept a friendship
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $newFriend = User::where('id', request('friend_id'))->firstOrFail();

        $user = auth()->user();

        $user->acceptFriendship($newFriend->id);

        $newFriend->notify(new FriendshipAccepted($user));

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
