<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 04/09/2017
 * Time: 09:32
 */

namespace App\Repositories\Notification;


use App\Models\NotificationUser;
use App\Models\User;
use App\Repositories\EloquentRepository;

class NotificationRepository extends EloquentRepository implements NotificationRepositoryInterface
{

    public function getModel()
    {
        return NotificationUser::class;
    }

    public static function getNotificationOfUser($user_id)
    {
        return NotificationUser::where('user1', $user_id)
            ->where('active', false)
            ->count();
    }

    public function createNotification($user1, $user2, $content)
    {
        NotificationUser::create([
            'user1' => $user1,
            'user2' => $user2,
            'content' => $content,
            'active' => false
        ]);
    }

    public static function clearNotificationOfUser($user_id)
    {
        NotificationUser::where('user1', $user_id)
            ->update(['active' => true]);
    }

    public function getListNoti($user_id)
    {
        $list_noti = NotificationUser::where('user1', $user_id)
            ->where('active', false)
            ->get();
        foreach ($list_noti as $noti) {
            $noti->follower = User::where('id', $noti['user1'])->first()->name;
            $noti->following = User::where('id', $noti['user2'])->first()->name;
        }
        return $list_noti;
    }
}