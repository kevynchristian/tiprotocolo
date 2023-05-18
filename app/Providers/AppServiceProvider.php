<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('protocolo', function (User $user) {
           return $user->rolesModel->role_id == 1;
        });
    }
}
