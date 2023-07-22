<?php

namespace App\Services\Admin\Dto\Category;

use App\Services\Admin\Requests\Category\UpdateRequest;

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
//            'images' => $data['images'],
        ]);
    }
}
