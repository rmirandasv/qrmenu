<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\UserRepository',
            'App\Repositories\UserRepoEloquentImpl'
        );

        $this->app->bind(
            'App\Services\UserService',
            'App\Services\UserServiceImpl'
        );

        $this->app->bind(
            'App\Repositories\QrmenuRepository',
            'App\Repositories\QrmenuRepoEloquentImpl'
        );

        $this->app->bind(
            'App\Services\QrmenuService',
            'App\Services\QrmenuServiceImpl'
        );

        $this->app->bind(
            'App\Repositories\QrmenuPageRepository',
            'App\Repositories\QrmenuPageRepoEloquentImpl'
        );

        $this->app->bind(
            'App\Services\QrmenuPageService',
            'App\Services\QrmenuPageServiceImpl'
        );

        $this->app->bind(
            'App\Repositories\QrmenuPageItemRepository',
            'App\Repositories\QrmenuPageItemRepoEloquentImpl'
        );

        $this->app->bind(
            'App\Services\QrmenuPageItemService',
            'App\Services\QrmenuPageItemServiceImpl'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
