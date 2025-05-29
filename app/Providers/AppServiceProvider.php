<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 管理者かどうかを判定するGate
        Gate::define('admin', function (User $user) {
            return $user->role === 'admin'; //  roleカラムが"admin"
        });

        // 一般ユーザーかどうかを判定するGate
        Gate::define('user', function (User $user) {
            return $user->role === 'user'; //  roleカラムが"user"
        });
    }
}
