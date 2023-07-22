<?php

namespace App\Services\Client\Providers;

use App\Services\Client as ClientService;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $singletons = [

        ClientService\Contracts\Register::class => ClientService\Actions\Register\RegisterAction::class,
        ClientService\Contracts\Login::class => ClientService\Actions\Login\LoginAction::class,
        ClientService\Contracts\GetAllCategories::class => ClientService\Actions\Category\GetAllAction::class,
        ClientService\Contracts\GetProductsByCategory::class => ClientService\Actions\Category\GetProductAction::class,
        ClientService\Contracts\GetAllOrdersByClient::class => ClientService\Actions\Order\GetAllByClientAction::class,
        ClientService\Contracts\GetOrdersByStatus::class => ClientService\Actions\Order\GetAllByStatus::class,
        ClientService\Contracts\StoreOrder::class => ClientService\Actions\Order\StoreAction::class,
        ClientService\Contracts\GetAllCarts::class => ClientService\Actions\Cart\GetAllAction::class,
        ClientService\Contracts\AddProductToCart::class => ClientService\Actions\Cart\AddProductAction::class,

    ];
}
