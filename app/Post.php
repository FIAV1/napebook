<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $fillable = ['text', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
