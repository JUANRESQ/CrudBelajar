<?php

namespace App\Providers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
        });
        gate::define('isOperator', function($user) {
            return $user->role == 'operator';
        });
        gate::define('isUser', function($user) {
            return $user->role == 'user';
        });
    }
}
