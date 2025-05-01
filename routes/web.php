<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;

require '../app/helpers.php';

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
Route::get('/about-us', function() {
    return view('about-us');
})->name('about-us');

// o projekcie
Route::get('/about-project', function() {
    return view('about-project');
})->name('about-project');

Route::get('/miejsca-pamieci', function() {
    return view('post-category', [
        'category' => "Miejsca pamięci"
    ]);
})->name('miejsca-pamieci');

Route::get('/publicystyka', function() {
    return view('post-category', [
        'category' => "Publicystyka"
    ]);
})->name('publicystyka');


Route::get('/publicystyka/{category}', function($category) {
    return view('post-category', [
        'category' => $category
    ]);
})->name('publicystyka.kategoria');
