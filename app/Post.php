<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tag(){
        return $this->belongsToMany('App\Tag', 'tag_post', 'post_id', 'tag_id')->withTimestamps();
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }

    public function scopePublished($query){
        return $query->where('published', '=', '1');
    }
}
