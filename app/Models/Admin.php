<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 07/07/2017
 * Time: 16:48
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends BaseModel
{
    use Notifiable;
    protected $table = 'admins';

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'active',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
