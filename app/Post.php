<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Comment;

class Post extends Model
{
    protected $fillable = ['text', 'image_url', 'user_id'];

    /**
     * A Post must have one User
     *
     * @return BelongsTo
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
     * Get Likes amout for a single Post
     * 
     * @return Integer
     */
    public function getLikesAmount()
    {
        return $this->likes()->count();
    }

    /**
     * Find user's friend posts
     *
     *
     * @return Post|\Illuminate\Support\Collection
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
            ->orderBy('posts.created_at', 'desc')
            ->get();
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
     * A Comment can be add to a Post
     *
     * @param $text
     *
     * @return Comment
     */
    public function addComment($text)
    {
        return $this->comments()->create([
            'text' => $text
        ]);
    }
}
