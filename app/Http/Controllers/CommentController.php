<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Http\Requests\StoreComment;

class CommentController extends Controller
{
    /**
     * Store a new comment.
     *
     * @param StoreComment $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreComment $request, Post $post)
    {

        $post->addComment($request->input('comment-text'));

        return back();
    }

    /**
     * Show the form for editing the comment.
     *
     * @param Comment $comment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Comment $comment)
    {
        return view('home', compact('comment'));
    }

    /**
     *Remove the comment.
     *
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect('home');
    }
}
