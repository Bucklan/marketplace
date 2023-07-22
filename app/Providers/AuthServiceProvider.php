<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Models\Category' => 'App\Policies\CategoryPolicy',
        'App\Models\Product' => 'App\Policies\ProductPolicy',
    ];

    public function boot(): void
    {
        //
    }
}
