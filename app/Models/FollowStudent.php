<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 07/07/2017
 * Time: 16:51
 */

namespace App\Models;


class FollowStudent extends BaseModel
{
    protected $table = 'follow_student';
    protected $fillable = [
        'id',
        'following',
        'follower',
    ];
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follow_user', 'follower', 'following');
    }

}
