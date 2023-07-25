<?php

namespace App\Services\Client\Actions\Register;

use App\Enums\User\Role;
use App\Models\User;
use App\Services\Client\Contracts\Register;
use App\Services\Client\Dto\Register\RegisterDto;
use App\Tasks\Client as Client;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Throwable;

class RegisterAction implements Register
{
    /**
     * @throws Throwable
     */
    public function execute(RegisterDto $dto): array
    {
        $this->ensureThatEmailIsNotRegisteredAndDeleted($dto);
        $this->ensureThatEmailIsNotRegistered($dto);
        $user = $this->createUser($dto);
        $user->assignRole(Role::CLIENT);
        return [
            'email' => $user->email,
            'token' => $user->createToken('auth_token')->plainTextToken,
        ];
    }

    private function createUser(RegisterDto $dto): User
    {
        return User::create($dto->except()->toArray());

    }

    private function ensureThatEmailIsNotRegisteredAndDeleted(RegisterDto $dto): void
    {
        $exists = app(Client\CheckExistingFromOnlyTrashedByEmailTask::class)->run($dto->email);
        if ($exists) {
            throw new UnprocessableEntityHttpException(
                'The account for this email has already been registered and deleted.'
            );
        }
    }

    private function ensureThatEmailIsNotRegistered(RegisterDto $dto): void
    {
        $exists = app(Client\CheckExistingByEmailTask::class)->run($dto->email);

        if ($exists) {
            throw new UnprocessableEntityHttpException(
                'The account for this phone is already registered.'
            );
        }
    }
//


}
