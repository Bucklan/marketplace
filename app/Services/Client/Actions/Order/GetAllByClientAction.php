<?php

namespace App\Services\Client\Actions\Order;

use App\Services\Client\Contracts\GetAllOrdersByClient;
use App\Tasks as Tasks;
use Auth;

class GetAllByClientAction implements GetAllOrdersByClient
{
    public function execute()
    {
        return app(Tasks\Order\GetAllOrdersByClientTask::class)->run(
            Auth::user()->id,
            ['orders.id', 'orders.amount', 'orders.ordered_at', 'orders.declined_at', 'orders.confirmed_at'],
            ['orderProducts']
        );
    }
}
