<?php

namespace App\Services\Client\Actions\Cart;

use App\Models\User;
use App\Services\Client\Contracts\GetAllCarts;
use Auth;
use App\Tasks as Tasks;

class GetAllAction implements GetAllCarts
{
    public function execute()
    {

        /** @var User $client */
        $client = Auth::user();
        return app(Tasks\Cart\GetAllTask::class)
            ->run($client->id,
                ['carts.id', 'carts.user_id',
                    'carts.product_id', 'carts.quantity', 'carts.created_at']);
    }
}
