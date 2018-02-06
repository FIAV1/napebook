<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $fillable = ['text', 'image_url', 'user_id'];

    /**
     * A Post must have one User
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
