<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // relacion uno a muchos (inversa)
    public function user() {
        //$user = User::find($this->user_id);
        return $this->belongsTo('App\Models\User');
    }

    public function commentable() {
        return $this->morphTo();
    }
}
