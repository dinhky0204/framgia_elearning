<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 04/09/2017
 * Time: 10:49
 */

namespace App\Models;


class NotificationUser extends BaseModel
{
    protected $table = 'notification_student';
    protected $fillable = [
        'id',
        'user1',
        'user2',
        'content',
        'active',
    ];
    public function notifications()
    {
        return $this->belongsToMany(User::class, 'notification_student', 'user1', 'user2');
    }
}