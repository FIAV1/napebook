<?php

namespace App;

use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /********** Registration **********/

    /**
     * Send the password reset notification.
     *
     * @param  string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        \Mail::to($this->email)->send(new ResetPasswordEmail($this, $token));
    }

    /**
     * Check if the user is verified
     *
     * @return bool
     */
    public function isVerified()
    {
        return $this->email_token === null;
    }

    /********** Post **********/

    /**
     * A User can have many Posts
     *
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * A User can have many Comments
     *
     * @return Post
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Store a new Post created by the authenticated user
     *
     * @param string $text
     * @param string $imageUrl
     */
    public function addPost($text, $imageUrl)
    {
        $this->posts()->create([
            'text' => $text,
            'image_url' => $imageUrl
        ]);
    }

    /********** Friends **********/

    /**
     * Find all accepted friends of the user
     *
     *
     * @return User
     */
    public function acceptedFriends()
    {
        return $this->friends()
            ->where('friendships.active', 1)
            ->select('users.*')
            ->get();
    }

    /**
     * Find all pendent friend request send to the user
     *
     *
     * @return User
     */
    public function pendingFriends()
    {
        return $this->join('friendships', 'users.id', '=', 'friendships.user_id')
            ->where('friendships.friend_id', $this->id)
            ->where('friendships.active', 0)
            ->select('users.*')
            ->get();
    }

    /**
     * Find all friend request sent by the user
     *
     *
     * @return User
     */
    public function requestFriends()
    {
        return $this->join('friendships', 'users.id', '=', 'friendships.friend_id')
            ->where('friendships.user_id', $this->id)
            ->where('friendships.active', 0)
            ->select('users.*')
            ->get();
    }


    /**
     * Search between the user's friends
     *
     * @param String $keyword
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function searchFriend($keyword)
    {
       return $this->friends()
           ->where(function($query) use ($keyword){
               $query->where('users.name', 'LIKE', '%'.$keyword.'%')
                   ->orWhere('users.surname', 'LIKE', '%'.$keyword.'%');
           })
           ->where('friendships.active', 1)
           ->get();
    }

    /**
     * Find all friends of the user
     *
     * @param string $query
     * @return User
     */
    public function scopeFriends($query)
    {
        return $query->join('friendships', function ($join) { $join
            ->on('users.id', '=', 'friendships.user_id')
            ->orOn('users.id', '=', 'friendships.friend_id');
        })
            ->where(function($query) { $query
                ->where('friendships.user_id', '=', $this->id)
                ->orWhere('friendships.friend_id', '=', $this->id);
            })
            ->where('users.id', '<>', $this->id )
            ->select('users.*');
    }

    /********** Friendship **********/

    /**
     * Store a friendship request
     *
     *
     * @param Integer $friend_id
     */
    public function addFriendship($friend_id)
    {
        DB::table('friendships')->insert([
            'user_id' => $this->id,
            'friend_id' => $friend_id,
            'created_at' => Carbon::now()
            ]);
    }

    /**
     * Update a friendship request
     *
     *
     * @param Integer $friendship_id
     */
    public function acceptFriendship($friend_id)
    {
        DB::table('friendships')
            ->where('user_id', $friend_id)
            ->where('friend_id', $this->id)
            ->update([
            'active' => true,
            'updated_at' => Carbon::now()
            ]);
    }

    /**
     * Delete a friendship or a friendship request (accepted or not)
     *
     *
     * @param Integer $friendship_id
     */
    public function deleteFriendship($friend_id)
    {
        DB::table('friendships')
            ->where(function($query) use ($friend_id){
                $query->where('friendships.user_id', $this->id)
                    ->where('friendships.friend_id', $friend_id);
            })
            ->orWhere(function($query) use ($friend_id){
                $query->where('friendships.user_id', $friend_id)
                    ->where('friendships.friend_id', $this->id);
            })
            ->delete();
    }

    /**
     * Check if the User passed is friend of te current User
     * 
     * @param Integer $user_id
     * @return Boolean
     */

    public function isFriendOf($user_id)
    {
        $friendship = DB::table('friendships')
            ->where(function($query) use ($user_id){
                $query->where('friendships.user_id', $this->id)
                    ->where('friendships.friend_id', $user_id)
                    ->where('friendships.active', 1);
            })
            ->orWhere(function($query) use ($user_id){
                $query->where('friendships.user_id', $user_id)
                    ->where('friendships.friend_id', $this->id)
                    ->where('friendships.active', 1);
            })
            ->first();

        if ($friendship) {
            return true;
        }

        return false;
    }

    /**
     * Check if the current User has sent a friendship request to the User passed
     * 
     * @param Integer $user_id
     * @return Boolean
     */

    public function friendshipSent($user_id){
        $friendship = DB::table('friendships')
            ->where('user_id', $this->id)
            ->where('friend_id', $user_id)
            ->where('active', 0)
            ->first();

        if ($friendship) {
            return true;
        }

        return false;
    }

    /**
     * Check if the current User has received a friendship request by the User passed
     * 
     * @param Integer $user_id
     * @return Boolean
     */

    public function friendshipReceived($user_id){
        $friendship = DB::table('friendships')
            ->where('user_id', $user_id)
            ->where('friend_id', $this->id)
            ->where('active', 0)
            ->first();

        if ($friendship) {
            return true;
        }

        return false;
    }

    /********** Likes **********/

    /**
     * Check if the current user has put Like to the Post passed
     * 
     * @param Integer $postId
     * @return Boolean
     */

    public function hasLike($postId)
    {
        if ( Like::where('user_id', $this->id)->where('post_id', $postId)->first()) {
            return true;
        }

        return false;
    }

    /********** Search **********/

    /**
     * Search users in Napebook, friends or not.
     *
     * @param String $keyword
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function search($keyword)
    {
        return $this
            ->where(function($query) use ($keyword){
                $query->where('users.name', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('users.surname', 'LIKE', '%'.$keyword.'%');
            })
            ->where('active', 1)
            ->orderBy('name')
            ->orderBy('surname')
            ->get();
    }
}
