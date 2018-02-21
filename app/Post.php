<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['text', 'image_url', 'user_id'];

    /**
     * A Post must have one User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A Post can have many Likes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * A Post can have many Comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get Likes amout for a single Post
     * 
     * @return int
     */
    public function getLikesAmount()
    {
        return $this->likes()->count();
    }

    /**
     * Get oldest comments of a post.
     * $except is used in order to get oldest comments except, for instance,
     * the latest comment that the user left.
     *
     * @param int $offset
     * @param int $limit
     * @param array $except
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function oldestComments($offset = 0, $limit = 3, $except = null)
    {
        return $this->comments()
            ->oldest()
            ->offset($offset)
            ->limit($limit)
            ->where(function($query) use ($except) {

                if(isset($except)) {
                    $query->wherenotIn('id', $except);
                }

            });
    }

    /**
     * Add a Comment to a Post
     *
     * @param string $text
     * @return \App\Comment
     */
    public function addComment($text)
    {
        $user_id= auth()->id();

        return $this->comments()->create(compact('user_id','text'));
    }

}
