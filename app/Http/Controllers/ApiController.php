<?php

namespace App\Http\Controllers;

use App\Like;
use App\Notifications\FriendshipAccepted;
use App\Notifications\FriendshipRequest;
use App\Notifications\PostCommented;
use App\Notifications\PostLiked;
use App\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class ApiController extends Controller
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
     * Get the latest 8 notifications about friendships
     *
     * @return array
     */
    public function getFriendshipNotifications()
    {
        return auth()->user()->friendshipNotifications(0, 8)->toArray();
    }

    /**
     * Get the notifications count about friendships
     *
     * @return integer
     */
    public function getFriendshipNotificationsCount()
    {
        return auth()->user()->friendshipNotificationsCount();
    }

    /**
     * Get the latest 8 notifications about likes and comments
     *
     * @return array
     */
    public function getGeneralNotifications()
    {
        return auth()->user()->generalNotifications(0, 8)->toArray();
    }

    /**
     * Get the notifications count about likes and comments
     *
     * @return mixed
     */
    public function getGeneralNotificationsCount()
    {
        return auth()->user()->generalNotificationsCount();
    }

    /**
     * Set a like on a post
     *
     * @param Request $request
     * @throws AuthorizationException
     * @return mixed
     */
    public function like(Request $request)
    {
        $post = Post::find($request->input('post_id'));

        $publisher = $post->user;
        $sender = auth()->user();

        //The current user can likes the post
        $this->authorize('like', $post);

        if ($post) {

            $like = new Like();
            $like->user()->associate($sender);
            $post->likes()->save($like);

            if ($publisher->id != $sender->id) {
                $publisher->notify(new PostLiked($sender, $post));
            }

            return json_encode($post->getLikesAmount());
        }
    }

    /**
     * Remove a like on a post
     *
     * @param Request $request
     * @throws AuthorizationException
     * @return mixed
     */
    public function unlike(Request $request)
    {
        $post = Post::find($request->input('post_id'));

        $sender = auth()->user();

        //The current user can likes the post
        $this->authorize('like', $post);

        $like = $post->likes()->where('user_id', $sender->id)->first();

        if ($like) {

            $like->delete();
        }

        return json_encode($post->getLikesAmount());
    }

    /**
     * Get the collection of all the users that likes a post
     *
     * @param Request $request
     * @return mixed
     */
    public function getPostLikes(Request $request)
    {
        $post = Post::find($request->input('post_id'));

        $users = collect();

        foreach ($post->likes as $like) {

            $users->push($like->user);
        }

        return json_encode($users);
    }

    /**
     * Get more home's posts for the current user
     *
     * @param Request $request
     * @return mixed
     */
    public function getHomePosts(Request $request)
    {
        $posts = Post::homePosts($request->input('offset'), $request->input('limit'));

        return view('post.collection', compact('posts'));
    }

    /**
     * Get more profile's posts of a user
     *
     * @param Request $request
     * @return mixed
     */
    public function getProfilePosts(Request $request)
    {
        $posts = auth()->user()->profilePosts($request->get('offset'), $request->get('limit'));

        return view('post.collection', compact('posts'));
    }

    /**
     * Get more comments of a posts
     *
     * @param Request $request
     * @return mixed
     */
    public function getPostComments(Request $request)
    {
        $post = Post::find($request->input('post_id'));

        if (!($array = $request->input('except'))) {
            $array = null;
        }

        $comments = $post->oldestComments($request->input('offset'), $request->input('limit'), $array)->get();

        return view('comment.collection', compact('comments'));
    }

}
