<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static function buildRoute($category) {
        return 'publicystyka.' . $category;
    }
}
