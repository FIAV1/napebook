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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreComment $request)
    {
        $post = Post::find($request->input('post-id'));
        $comment = $post->addComment($request->input('comment-text'));

        return response()->json(['comment' => $comment, 'user' => $comment->user]);
    }

    /**
     * Show the form for editing the comment.
     *
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Comment $comment)
    {
        return response()->json(['comment' => $comment, 'user' => $comment->user]);
    }

    /**
     * Update the comment.
     *
     * @param StoreComment $request
     * @param Comment $comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreComment $request, Comment $comment)
    {
        $comment->text = $request->input('comment-text');
        $comment->save();

        return response()->json($comment);
    }

    /**
     * Remove the comment.
     *
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json($comment);
    }
}
