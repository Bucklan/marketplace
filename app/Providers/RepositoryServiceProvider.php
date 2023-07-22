<?php

namespace App\Providers;

use App\Repositories as Repositories;
use Carbon\Laravel\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        Repositories\UserRepositoryInterface::class => Repositories\Eloquent\UserRepository::class,
        Repositories\CategoryRepositoryInterface::class => Repositories\Eloquent\CategoryRepository::class,
        Repositories\ProductRepositoryInterface::class => Repositories\Eloquent\ProductRepository::class,
        Repositories\OrderRepositoryInterface::class => Repositories\Eloquent\OrderRepository::class,
        Repositories\CartRepositoryInterface::class => Repositories\Eloquent\CartRepository::class,
    ];
}
