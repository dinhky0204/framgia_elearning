<?php
/**
 * Created by PhpStorm.
 * User: dinhky
 * Date: 04/09/2017
 * Time: 16:23
 */

namespace App\Providers;


use App\Repositories\Notification\NotificationRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot() {
        View::composer('*', function ($view)
        {
            if(!Auth::guest()) {
                $noti = NotificationRepository::getNotificationOfUser(Auth::user()->id);
                $view->with('total_notification', $noti );
            }

        });
    }
}