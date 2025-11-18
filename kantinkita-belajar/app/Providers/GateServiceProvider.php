<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class GateServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::define('admin-access', function ($user) {
            return $user->role === 'admin';
        });
    }
}
