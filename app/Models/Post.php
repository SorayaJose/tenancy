<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // relacion uno a muchos (inversa)
    public function user() {
        //$user = User::find($this->user_id);
        return $this->belongsTo('App\Models\User');
    }

    // relacion uno a muchos (inversa)
    public function category() {
        //$user = User::find($this->user_id);
        return $this->belongsTo('App\Models\Category');
    }
    
    // relacion uno a uno polimorfica
    public function image() {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    // relacion uno a muchos polimorfica
    public function comments() {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    // relacion muchos a muchos polimorfica
    public function tags() {
        //return $this->belongsToMany('App\Models\Tag', 'taggable');
        return $this->belongsToMany('App\Models\Tag');
    }

}
