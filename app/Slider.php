<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public function scopePublished($query){
        return $query->where('published', '=', '1');
    }
}
