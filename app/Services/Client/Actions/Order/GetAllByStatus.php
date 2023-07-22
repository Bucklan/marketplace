<?php

namespace App\Services\Client\Actions\Order;

use App\Enums\Order\Status;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Services\Client\Contracts\GetAllOrdersByClient;
use App\Services\Client\Contracts\GetOrdersByStatus;
use App\Tasks\Order\GetOrdersByStatusTask;
use BenSampo\Enum\Enum;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class GetAllByStatus implements GetOrdersByStatus
{
    public function execute(string $status)
    {

        return app(GetOrdersByStatusTask::class)->run($status,
            ['orders.id', 'orders.amount', 'orders.status', 'orders.ordered_at', 'orders.declined_at', 'orders.confirmed_at'],
            ['OrderProducts'],
        );
    }
}
