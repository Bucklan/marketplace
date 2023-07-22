<?php

namespace App\Services\Admin\Contracts;

use App\Models\Order;

interface ConfirmOrder
{
public function execute(Order $order);
}
