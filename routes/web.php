<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;

use App\Http\Controllers\PostsController;

// strona glowna
Route::get('/', function() {
    return view('index', [
        'post' => Post::latest()->first()
    ]);

})->name('index');

// jeden artykul
// Route::get('/post/{post}', function(Post $post) {
//     return view('show-post', [
//         'post' => $post
//     ]);
// })->name('post.show');

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
        'category' => "Publicystyka",
        'posts' => Post::all()
    ]);
})->name('publicystyka');


Route::get('/publicystyka/{category}', function($category) {
    $cat = new Category;
    $id = $cat->getIdByName($category);

    $categories = Category::findOrFail($id);

    return view('post-category', [
        'category' => $category,
        'posts' => $categories->posts
    ]);
})->name('publicystyka.kategoria');

Route::get('/patronaty', function() {
    return view('patronaty');
})->name('patronaty');

Route::get('/partnerzy', function() {
    return view('partners');
})->name('partners');

Route::get('/kontakt', function() {
    return view('contact');
})->name('contact');

Route::get('/panel', function() {
    return view('panel');
})->name('panel');

Route::resource('/post', 'App\Http\Controllers\PostsController');
