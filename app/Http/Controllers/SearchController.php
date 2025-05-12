<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Post $post, Request $request)
    {
        $posts = Post::query()->where('title', 'LIKE', "%{$request->get('query')}%")->get();
        return view('search', ['posts' => $posts]);
    }
}
