<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // relacion muchos a muchos polimorfica
    public function posts() {
        return $this->morphedByMany('App\Models\Post', 'taggable')
    }

    // relacion muchos a muchos polimorfica
    public function archives() {
        return $this->morphedByMany('App\Models\Archive', 'taggable')
    }    
}
