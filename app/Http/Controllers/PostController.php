<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Post;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        // Verify if a file is present and upload it in case
        $path = null;

        if ($request->hasFile('post-image')) {
            if($request->file('post-image')->isValid()) {
                $path = Storage::putFile(
                    'post-images', $request->file('post-image')
                );
                $path = 'storage/'.$path;
            }
        }

        // Store a new Post
        $post = Post::create([
            'text' => request('post-text'),
            'image' => $path,
            'user_id' => auth()->id()
        ]);
        
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        // Find the post by the id
        $post = Post::findOrFail($id);

        // Verify if a file is present and upload it in case
        $path = $post->image;

        if ($request->hasFile('post-image')) {
            if($request->file('post-image')->isValid()) {
                Storage::delete($path);
                $path = Storage::putFile(
                    'post-images', $request->file('post-image')
                );
                $path = 'storage/'.$path;
            }
        }

        // Removing file from filesystem and from db
        if (request('remove')) {
            Storage::delete($path);
            $path = null;
        }

        // Update the Post
        $post->text = request('post-text');
        $post->image = $path;
        $post->save();
        
        return view('post.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        
        return redirect('home');
    }
}
