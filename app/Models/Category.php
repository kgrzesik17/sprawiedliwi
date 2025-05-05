<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = ['category_name'];

    public static function buildRoute($category) {
        return 'publicystyka/' . $category;
    }

    public function posts() {
        return $this->hasMany('App\Models\Post')->orderBy('id', 'DESC');
    }

    public function getIdByName($name) {
        if(!$this->first()) {
            $this->create(['category_name' => 'literatura']);
        }

        return $this->where('category_name', $name)->first()->id;
    }
}
