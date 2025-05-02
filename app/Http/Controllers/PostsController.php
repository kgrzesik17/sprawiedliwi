<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort(404, '');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::create($validated);

        // return redirect()->route('post.show', ['post' => $post]);
        return redirect()->route('panel');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('show-post', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('edit-post', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());

        // return redirect()->route('post.show', ['post' => $post]);
        return redirect('panel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('panel');
    }
}
