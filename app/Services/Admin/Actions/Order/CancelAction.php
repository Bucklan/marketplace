<?php

namespace App\Services\Admin\Actions\Order;

use App\Enums\Order\Status;
use App\Models\Order;
use App\Services\Admin\Contracts\CancelOrders;

class CancelAction implements CancelOrders
{
public function execute(Order $order)
{

    $order->update([
        'status' => Status::CANCELED,
        'confirmed_at' => now(),
    ]);
}
}
