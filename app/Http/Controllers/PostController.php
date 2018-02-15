<?php

namespace App\Http\Controllers;

use App\Notifications\FriendshipRequest;
use App\Post;
use Storage;
use App\Http\Requests\StorePost;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePost  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        // Verify if a file is present and upload it in case
        $path = null;

        if ($request->hasFile('post-image')) {
            if ($request->file('post-image')->isValid()) {
                $path = Storage::putFile('post-images', $request->file('post-image'));
            }
        }

        // Store a new Post
        auth()->user()->addPost($request->input('post-text'), $path);
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

        /**
     * Display the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return response()->json(['post' => $post, 'user' => $post->user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StorePost  $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, Post $post)
    {
        // Verify if a file is present and upload it in case
        $path = $post->image_url;

        if ($request->hasFile('post-image')) {
            if($request->file('post-image')->isValid()) {
                Storage::delete($path);
                $path = Storage::putFile(
                    'post-images', $request->file('post-image')
                );
            }
        }
        else{
            // Removing file from filesystem and from db
            if ($request->filled('remove')) {
                Storage::delete($path);
                $path = null;
            }
        }

        // Update the Post
        $post->text = $request->input('post-text');
        $post->image_url = $path;
        $post->save();
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->image_url);
        $post->delete();
        
        return redirect('home');
    }
}
