<?php

namespace App\Services\Client\Contracts;

use App\Services\Client\Dto\Order\StoreDto;

interface StoreOrder
{
public function execute(StoreDto $dto);
}
