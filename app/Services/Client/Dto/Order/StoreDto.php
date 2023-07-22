<?php

namespace App\Services\Client\Dto\Order;

use Spatie\DataTransferObject\DataTransferObject;

class StoreDto extends DataTransferObject
{
    public array $products;

}
