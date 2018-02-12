<?php

namespace App\Http\Controllers;


use App\Notifications\FriendshipRequest;
use App\User;

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
        //auth()->user()->addFriendship(request('friend_id'));
        //dd(User::where('id', request('friend_id'))->firstOrFail());


        $user = User::where('id', request('friend_id'))->firstOrFail();

        $requestor = auth()->user();


        if ($requestor->id == $user->id) {
            return back()->withError("You can't add yourself");
        }

        //if (!$requestor->isFriend($user->id)) {

            $requestor->addFriendship($user->id);


            /**
             * Sending a notification to te followed user
             * We could call the notify method on a User model because it is already using the Notifiable trait.
             * Any model you want to notify should be using it to get access to the notify method.
             */
            $user->notify(new FriendshipRequest($requestor));

            return redirect('home')->withSuccess("You are now friends with {$user->name}");
        //}

        //return back()->withError("You are already following {$user->name}");

        //return back();
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
