<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // public function getLatest() {
    //     return $this->latest()->first();
    // }

    public function category() {
        return $this->hasOne('App\Models\Category');
    }
}
