<?php

namespace App\Services\Client\Providers;

use App\Services\Client as ClientService;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $singletons = [

        ClientService\Contracts\Logout::class => ClientService\Actions\Logout\LogoutAction::class,

        ClientService\Contracts\Login::class => ClientService\Actions\Login\LoginAction::class,
        ClientService\Contracts\ResendLoginCode::class => ClientService\Actions\Login\ResendCodeAction::class,
        ClientService\Contracts\VerifyLoginCode::class => ClientService\Actions\Login\VerifyCodeAction::class,

        ClientService\Contracts\Register::class => ClientService\Actions\Register\RegisterAction::class,
        ClientService\Contracts\ResendRegisterCode::class => ClientService\Actions\Register\ResendCodeAction::class,
        ClientService\Contracts\VerifyRegisterCode::class => ClientService\Actions\Register\VerifyCodeAction::class,

        ClientService\Contracts\GetAllBanners::class => ClientService\Actions\Banner\GetAllAction::class,

        ClientService\Contracts\GetAllGenres::class => ClientService\Actions\Genre\GetAllAction::class,

        ClientService\Contracts\GetAllCategories::class => ClientService\Actions\Category\GetAllAction::class,

        ClientService\Contracts\GetAllSets::class => ClientService\Actions\Set\GetAllAction::class,

        ClientService\Contracts\GetGamesByGenre::class => ClientService\Actions\Game\GetByGenreAction::class,

        ClientService\Contracts\GetCitiesList::class => ClientService\Actions\City\GetListAction::class,

        ClientService\Contracts\GetProductsByCategory::class => ClientService\Actions\Product\GetByCategoryAction::class,

        ClientService\Contracts\AddProductToCart::class => ClientService\Actions\Cart\AddProductAction::class,
        ClientService\Contracts\GetAllCarts::class => ClientService\Actions\Cart\GetAllAction::class,
        ClientService\Contracts\DeleteProductCart::class => ClientService\Actions\Cart\DeleteAction::class,
        ClientService\Contracts\DeleteAllProductCart::class => ClientService\Actions\Cart\DeleteAllAction::class,

        ClientService\Contracts\CreateAddress::class => ClientService\Actions\Address\CreateAction::class,
        ClientService\Contracts\GetAllAddresses::class => ClientService\Actions\Address\GetAllAction::class,
        ClientService\Contracts\UpdateAddress::class => ClientService\Actions\Address\UpdateAction::class,
        ClientService\Contracts\DeleteAddress::class => ClientService\Actions\Address\DeleteAction::class,

        ClientService\Contracts\GetMakeOrder::class => ClientService\Actions\Order\GetMakeAction::class,
        ClientService\Contracts\GetAllOrdersByClient::class => ClientService\Actions\Order\GetAllByClient::class,
        ClientService\Contracts\StoreOrder::class => ClientService\Actions\Order\StoreAction::class,

        ClientService\Contracts\GetAllClientInvites::class => ClientService\Actions\ClientInvite\GetAllAction::class,

        ClientService\Contracts\GetAllHelpSections::class => ClientService\Actions\HelpSection\GetAllAction::class,

        ClientService\Contracts\GetPromocodeValue::class => ClientService\Actions\Promocode\GetValueAction::class,

    ];
}
