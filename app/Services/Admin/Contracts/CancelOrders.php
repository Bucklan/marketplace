<?php

namespace App\Services\Admin\Contracts;

use App\Models\Order;

interface DeclineOrders
{
public function execute(Order $order);
}
