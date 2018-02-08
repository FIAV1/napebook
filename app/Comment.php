<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['text'];
    /**
     * A Comment must have one Post
     *
     * @return Post
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * A Comment must have one User
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
