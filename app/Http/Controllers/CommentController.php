<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Http\Requests\StoreComment;

class CommentController extends Controller
{
    public function store(StoreComment $request, Post $post)
    {

        $post->addComment(request('text'));

        return back();
    }
}
