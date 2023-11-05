<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // relacion uno a uno
    public function profile() {
        //$profile = Profile::where('user_id', $this->id)->first();
        // App\Models\Profile == Profile::class
        return $this->hasOne(Profile::class);
    }

    // relacion uno a muchos
    public function posts() {
        return $this->hasMany('App\Models\Post');
    }

    // relacion uno a muchos
    public function archives() {
        return $this->hasMany('App\Models\Archive');
    }

    // relacion muchos a muchos
    public function roles() {
        return $this->belongsToMany('App\Models\Role');
    }

    // relacion uno a uno polimorfica
    public function image() {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    // relacion uno a muchos polimorfica
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }    
}