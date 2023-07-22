<?php

namespace App\Services\Client\Dto\Order;

use App\Services\Client\Request\Order\StoreRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class StoreDtoFactory
{
    /**
     * @throws UnknownProperties
     */
    public static function fromRequest(StoreRequest $request): StoreDto
    {
        return self::fromArray($request->validated());
    }

    /**
     * @throws UnknownProperties
     */
    public static function fromArray(array $data): StoreDto
    {
        return new StoreDto([
            'products' => $data['products'],
        ]);
    }
}
