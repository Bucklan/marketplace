<?php

namespace App\Services\Client\Contracts;

use Illuminate\Http\Request;

interface GetOrdersByStatus
{
    public function execute(string $status);
}
