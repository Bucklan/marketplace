<?php

namespace App\Services\Admin\Providers;

use App\Services\Admin\Contracts\Login;
use Carbon\Laravel\ServiceProvider;

class ActionServiceProviders extends ServiceProvider
{
public array $singletons = [
    Login::class => 
];
}
