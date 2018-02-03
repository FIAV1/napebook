<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Storage;

class Post extends Model
{
    protected $fillable = ['text', 'image', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
