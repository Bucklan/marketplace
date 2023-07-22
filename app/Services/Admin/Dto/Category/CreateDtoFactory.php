<?php

namespace App\Services\Admin\Dto\Product;

use App\Services\Admin\Requests\Product\StoreRequest;

class CreateDtoFactory
{
    public static function fromRequest(StoreRequest $request): CreateDto
    {
        return self::fromArray($request->validated());

    }

    public static function fromArray(array $data): CreateDto
    {
        return new CreateDto([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'category_id' => $data['category_id'],
//            'images' => $data['images'],
        ]);
    }
}
