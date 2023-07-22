<?php

namespace App\Services\Admin\Dto\Manager;

use App\Services\Admin\Requests\Manager\UpdateRequest;

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
            'email' => $data['email'],
            'password' => $data['password'],
            'permissions' => $data['permissions'],
        ]);
    }
}
