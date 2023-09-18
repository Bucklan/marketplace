<?php

namespace App\Services\Admin\Actions\Order;

use App\Enums\Order\Status;
use App\Services\Admin\Contracts\GetAllOrders;
use App\Tasks as Tasks;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class GetAllByCreatedAction implements GetAllOrders
{
    public function execute()
    {
        $orders = app(Tasks\Order\GetAllOrdersTask::class)->run(
            [Status::CREATED],
            ['orders.id', 'orders.user_id', 'orders.amount', 'orders.status'],
            ['orderProducts', 'user']
        );
        return $this->checkOrderProductIsNotNull($orders);
    }

    private function checkOrderProductIsNotNull($orders)
    {
        foreach ($orders as $order) {
            if (!$order->orderProducts || $order->orderProducts->isEmpty()) {
                $orders = null;
            }
        }

        return $orders;
    }


}
