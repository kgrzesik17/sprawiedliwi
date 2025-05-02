<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['id', 'title', 'content', 'author_id', 'category_id', 'created_at', 'updated_at'];


    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
}
