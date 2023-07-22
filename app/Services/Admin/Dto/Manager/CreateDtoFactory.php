<?php

namespace App\Services\Admin\Dto\Manager;

use App\Services\Admin\Requests\Manager\StoreRequest;

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
            'email' => $data['email'],
            'password' => $data['password'],
            'permissions' => $data['permissions'],
        ]);
    }
}
