<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;

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
        if(auth()->check()) {
            return view('create-post');
        }
        else {
            return abort(404);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Post $post, PostRequest $request)
    {
        if(auth()->check()) {
            $validated = $request->validated();

            if($file = $request->file('input_file')) {
                $name = $file->getClientOriginalName();

                $file->move('images', $name);

                $validated['path'] = $name;
            }

            $validated['author_id'] = Auth::id();
            $validated['slug'] = Str::slug($request['title']);

            $post = Post::create($validated);

            // return redirect()->route('post.show', ['post' => $post]);
            return redirect()->route('panel');
        } else {
            return abort(404);
        }
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
        if(auth()->check()) {
            return view('edit-post', [
                'post' => $post
            ]);
        } else {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if(auth()->check()) {
            if($file = $request->file('input_file')) {
                $name = $file->getClientOriginalName();

                $file->move('images', $name);

                $post['path'] = $name;
            }

            $post->update($request->all());

            // return redirect()->route('post.show', ['post' => $post]);
            return redirect('panel');
        } else {
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if(auth()->check()) {
            $post->delete();

            return redirect('panel');
        } else {
            return abort(404);
        }
    }
}
