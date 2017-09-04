<?php

namespace App\Providers;

use App\Models\NotificationUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repositories\Question\QuestionRepositoryInterface::class,
            \App\Repositories\Question\QuestionRepository::class,
            \App\Repositories\Answer\AnswerRepositoryInterface::class,
            \App\Repositories\Answer\AnswerRepository::class,
            \App\Repositories\Course\CourseRepository::class,
            \App\Repositories\Course\CourseRepositoryInterface::class,
            \App\Repositories\Subject\SubjectRepositoryInterface::class,
            \App\Repositories\Subject\SubjectRepository::class
        );
    }
}
