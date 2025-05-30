<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id', 'title', 'content', 'author_id', 'category_id', 'created_at', 'updated_at', 'path', 'slug'];

    public function getRouteKeyName(){
        return 'slug';
    }


    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function author() {
        return $this->belongsTo('App\Models\User');
    }
}
