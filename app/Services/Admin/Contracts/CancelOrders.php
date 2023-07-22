<?php

namespace App\Services\Admin\Contracts;

use App\Models\Order;

interface CancelOrders
{
public function execute(Order $order);
}
