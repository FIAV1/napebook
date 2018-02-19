<?php

namespace App\Http\Controllers;

use App\Notifications\FriendshipAccepted;
use App\Notifications\FriendshipRequest;
use App\Notifications\PostCommented;
use App\Notifications\PostLiked;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function friendshipNotifications()
    {
        return auth()->user()->unreadNotifications()
            ->where(function($query) {
                $query->where('type', FriendshipRequest::class)
                    ->orWhere('type', FriendshipAccepted::class);
            })
            ->limit(5)
            ->latest()
            ->get()->toArray();
    }

    public function friendshipNotificationsCount()
    {
        return auth()->user()->unreadNotifications()
            ->where(function($query) {
                $query->where('type', FriendshipRequest::class)
                    ->orWhere('type', FriendshipAccepted::class);
            })
            ->count();
    }

    public function generalNotifications()
    {
        return auth()->user()->unreadNotifications()
            ->where(function($query) {
                $query->where('type', PostCommented::class)
                    ->orWhere('type', PostLiked::class);
            })
            ->limit(5)
            ->latest()
            ->get()->toArray();
    }

    public function generalNotificationsCount()
    {
        return auth()->user()->unreadNotifications()
            ->where(function($query) {
                $query->where('type', PostCommented::class)
                    ->orWhere('type', PostLiked::class);
            })
            ->count();
    }

}
