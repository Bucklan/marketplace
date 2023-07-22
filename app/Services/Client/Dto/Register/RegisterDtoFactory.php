<?php

namespace App\Services\Client\Dto\Register;

use App\Services\Client\Request\Register\RegisterRequest;

class RegisterDtoFactory
{
    public static function fromRequest(RegisterRequest $request): RegisterDto
    {
        return self::fromArray($request->validated());
    }

    public static function fromArray(array $data): RegisterDto
    {
        return new RegisterDto([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);
    }
}
