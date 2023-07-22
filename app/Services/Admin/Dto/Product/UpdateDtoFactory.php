<?php

namespace App\Services\Admin\Dto\Product;

use App\Services\Admin\Requests\Product\UpdateRequest;

class UpdateDtoFactory
{
    public static function fromRequest(UpdateRequest $request): UpdateDto
    {
        return self::fromArray($request->validated());

    }

    public static function fromArray(array $data): UpdateDto
    {
        return new UpdateDto([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'category_id' => $data['category_id'],
//            'images' => $data['images'],
        ]);
    }
}
