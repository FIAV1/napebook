<?php

namespace App;

use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;

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

    /**
     * Check if the user is verified
     *
     * @return bool
     */
    public function verified()
    {
        return $this->email_token === null;
    }

    /**
     * A User can have many Posts
     *
     * @return Post
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Store a new Post created by the authenticated user
     *
     * @param Text $text
     * @param String $path
     */
    public function addPost($text, $imageUrl)
    {
        $this->posts()->create([
            'text' => $text,
            'image_url' => $imageUrl
        ]);
    }

}
