<?php
namespace App\Repositories\Notification;
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 04/09/2017
 * Time: 09:30
 */
interface NotificationRepositoryInterface
{
    public static function getNotificationOfUser($user_id);
    public function createNotification($user1, $user2, $content);
    public static function clearNotificationOfUser($user_id);
    public function getListNoti($user_id);
}