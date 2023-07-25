<?php

namespace App\Services\Admin\Dto\Category;

use App\Services\Admin\Requests\Category\StoreRequest;

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
            'image' => $data['image'],
        ]);
    }
}
