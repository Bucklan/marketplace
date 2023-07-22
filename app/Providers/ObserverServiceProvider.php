<?php

namespace App\Providers;


use App\Observers as Observers;
use Closure;
use Illuminate\Support\ServiceProvider;
use App\Models as Models;

class ObserverServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Models\User::observe(Observers\UserObserver::class);
    }
}
