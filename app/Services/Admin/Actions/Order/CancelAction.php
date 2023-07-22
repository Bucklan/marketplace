<?php

namespace App\Services\Admin\Actions\Order;

use App\Enums\Order\Status;
use App\Models\Order;
use App\Services\Admin\Contracts\DeclineOrders;

class DeclineAction implements DeclineOrders
{
public function execute(Order $order)
{
    if ($order->status == Status::CONFIRMED) {
        throw new \Exception('This order has already been confirmed');
    }

    Order::update([
        'status' => Status::CANCELED,
        'confirmed_at' => now(),
    ]);
}
}
