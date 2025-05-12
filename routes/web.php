<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;

use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');

// jeden artykul
// Route::get('/post/{post}', function(Post $post) {
//     return view('show-post', [
//         'post' => $post
//     ]);
// })->name('post.show');

// konkurs na statuetke
Route::get('/konkurs', function() {
    return view('konkurs', ['html-title' => "Konkurs"]);
})->name('konkurs');

// o sprawiedliwych
Route::get('/o-sprawiedliwych', function() {
    return view('about-us', ['html_title' => "O sprawiedliwych"]);
})->name('about-us');

// o projekcie
Route::get('/o-projekcie', function() {
    return view('about-project', ['html_title' => "O projekcie"]);
})->name('about-project');

Route::get('/miejsca-pamieci', function() {
    return view('post-category', [
        'category' => "Miejsca pamięci"
    ]);
})->name('miejsca-pamieci');

Route::get('/category/publicystyka', function() {
    return view('post-category', [
        'category' => "Publicystyka",
        'posts' => Post::orderBy('id', 'DESC')->get(),
        'html_title' => "Publicystyka"
    ]);
})->name('publicystyka');


Route::get('/category/{category}', function($category) {
    $cat = new Category;
    $id = $cat->getIdByName($category);

    $categories = Category::findOrFail($id);

    return view('post-category', [
        'category' => $category,
        'posts' => $categories->posts,
        'html_title' => Str::title($category)
    ]);
})->name('publicystyka.kategoria');

Route::get('/patronat-medialny', function() {
    return view('patronaty', ['html_title' => "Patronaty"]);
})->name('patronaty');

Route::get('/partnerzy', function() {
    return view('partners', ['html_title' => "Partnerzy"]);
})->name('partners');

Route::get('/kontakt', function() {
    return view('contact', ['html_title' => "Kontakt"]);
})->name('contact');

Route::get('/panel', function() {
    return view('panel', ['html_title' => "Panel Administratora"]);

})->name('panel')->middleware('is_logged_in');

Route::delete('category/{category}', function (Category $category) {
    $category->delete();

    return redirect()->route('panel');
})->name('category.destroy')->middleware('is_logged_in');

Route::post('category', function (Request $request) {
    $validated = $request->validate([
        'category_name' => 'required|max:64'
    ]);

    Category::create($validated);

    return redirect()->route('panel');
})->name('category.store')->middleware('is_logged_in');

Route::resource('/post', 'App\Http\Controllers\PostsController')->middleware('is_logged_in');

// auth
Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
