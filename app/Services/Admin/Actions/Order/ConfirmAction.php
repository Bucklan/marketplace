<?php

namespace App\Services\Admin\Actions\Order;

use App\Enums\Order\Status;
use App\Models\Order;
use App\Services\Admin\Contracts\ConfirmOrder;

class ConfirmAction implements ConfirmOrder
{
    public function execute(Order $order)
    {

        $order->update([
            'status' => Status::CONFIRMED,
            'confirmed_at' => now(),
        ]);
    }
}
