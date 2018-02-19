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

    /**
     * Find user's friends posts
     *
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public static function homePosts()
    {
        return (new static)->newQuery()
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('friendships', function ($join) {
                $join
                    ->on('users.id', '=', 'friendships.user_id')
                    ->orOn('users.id', '=', 'friendships.friend_id');
            })
            ->where(function ($query) {
                $query->where('friendships.user_id', '=', auth()->user()->id)
                    ->orWhere('friendships.friend_id', '=', auth()->user()->id);
            })
            ->where('friendships.active', 1)
            ->select('posts.*')
            ->distinct()
            ->orderBy('posts.created_at','desc');
    }

}
