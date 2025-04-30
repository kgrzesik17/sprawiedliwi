<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;

// strona glowna
Route::get('/', function() {
    return view('index', [
        'post' => Post::latest()->first()
    ]);

})->name('index');

// jeden artykul
Route::get('/post/{post}', function(Post $post) {
    return view('show-post', [
        'post' => $post
    ]);
})->name('post.show');

// konkurs na statuetke
Route::get('/konkurs', function() {
    return view('konkurs');
})->name('konkurs');

// o sprawiedliwych
Route::get('/about', function() {
    return view('about');
})->name('about');
