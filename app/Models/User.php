<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Symfony\Component\Console\Question\Question;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'point',
        'avatar',
        'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }
    public function follower()
    {
        return $this->belongsToMany(User::class);
    }
    public function following()
    {
        return $this->belongsToMany(User::class);
    }
}