<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static function buildRoute($category) {
        return 'publicystyka/' . $category;
    }

    public function posts() {
        return $this->hasMany('App\Models\Post');
    }

    public function getIdByName($name) {
        return $this->where('category_name', $name)->first()->id;
    }
}
