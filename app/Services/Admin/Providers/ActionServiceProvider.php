<?php

namespace App\Services\Admin\Providers;

use App\Services\Admin as Admin;
use Carbon\Laravel\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $singletons = [
        Admin\Contracts\Login::class => Admin\Actions\Login\LoginAction::class,
        Admin\Contracts\Logout::class => Admin\Actions\LogoutAction::class,
        Admin\Contracts\GetAllProduct::class => Admin\Actions\Product\GetAllAction::class,
        Admin\Contracts\CreateProduct::class => Admin\Actions\Product\CreateAction::class,
        Admin\Contracts\GetAllCategories::class => Admin\Actions\Category\GetAllAction::class,
        Admin\Contracts\UpdateProduct::class => Admin\Actions\Product\UpdateAction::class,
        Admin\Contracts\DeleteProduct::class => Admin\Actions\Product\DeleteAction::class,
        Admin\Contracts\CreateCategory::class => Admin\Actions\Category\CreateAction::class,
        Admin\Contracts\UpdateCategory::class => Admin\Actions\Category\UpdateAction::class,
        Admin\Contracts\DeleteCategory::class => Admin\Actions\Category\DeleteAction::class,
        Admin\Contracts\GetAllOrders::class => Admin\Actions\Order\GetAllAction::class,
        Admin\Contracts\ConfirmOrder::class => Admin\Actions\Order\ConfirmAction::class,
        Admin\Contracts\CancelOrders::class => Admin\Actions\Order\CancelAction::class,
        Admin\Contracts\GetAllClients::class => Admin\Actions\Client\GetAllAction::class,
        Admin\Contracts\BlockUser::class => Admin\Actions\Client\BlockAction::class,
        Admin\Contracts\UnblockUser::class => Admin\Actions\Client\UnblockAction::class,
        Admin\Contracts\GetAllManagers::class => Admin\Actions\Manager\GetAllAction::class,
        Admin\Contracts\StoreManager::class => Admin\Actions\Manager\StoreAction::class,
        Admin\Contracts\UpdateManager::class => Admin\Actions\Manager\UpdateAction::class,
    ];
}
