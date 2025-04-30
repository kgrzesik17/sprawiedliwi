<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

// index
Route::get('/', function() {
    return view('index', [
        'post' => Post::latest()->first()
    ]);

})->name('index');

// single article
Route::get('/post/{post}', function(Post $post) {
    return $post->title;
})->name('post.show');
