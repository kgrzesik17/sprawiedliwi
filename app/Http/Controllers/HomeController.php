<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;


class HomeController extends Controller
{
    public function index() {
        $cat = new Category;
        $literatura_id = $cat->getIdByName('literatura');

        $literatura = Category::findOrFail($literatura_id);

        return view('index', [
            'post' => Post::latest()->first(),
            'literatura' => $literatura->posts->take(3)
        ]);
    }
}
