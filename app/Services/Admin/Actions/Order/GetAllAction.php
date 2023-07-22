<?php

namespace App\Services\Admin\Actions\Order;

use App\Services\Admin\Contracts\GetAllOrders;
use App\Tasks as Tasks;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class GetAllAction implements GetAllOrders
{
    public function execute()
    {
        $orders = app(Tasks\Order\GetAllOrdersTask::class)->run(
            ['orders.id', 'orders.user_id', 'orders.amount', 'orders.status'],
            ['orderProducts', 'user']
        );
        return $this->checkOrderProductIsNotNull($orders);
    }

    private function checkOrderProductIsNotNull($orders)
    {
        foreach ($orders as $order) {
            // Check if the orderProducts relation is present and not empty
            if (!$order->orderProducts || $order->orderProducts->isEmpty()) {
                $orders = null;
            }
        }

        return $orders;
    }


}
