<?php

namespace App\Services\Admin\Actions\Login;

use App\Enums\User\Role as Role;
use App\Models\User;
use App\Services\Admin\Contracts\Login;
use App\Tasks\Client\FindByEmailTask;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Throwable;


class LoginAction implements Login
{

    public function __construct(FindByEmailTask $findByEmailTask)
    {
        $this->findByEmailTask = $findByEmailTask;
    }

    public function execute(string $email, string $password): array
    {
        $user = $this->findByEmailTask->run($email);

        if (!$user) {
            throw new \Exception('User not found');
        } else {
            $this->validateLogin($email, $password);
        }
        $this->ensureThatUserIsNotBlocked($user);
        $this->ensureThatUserHasRoles($user);

        $this->deleteUserTokens($user);
        return [
            'token' => $this->createUserToken($user),
            'permissions' => $this->getUserPermissions($user)
        ];
    }

    private function deleteUserTokens(User $user): void
    {
        DB::transaction(function () use ($user) {
            $user->tokens()->delete();
        });
    }

    private function createUserToken(User $user): string
    {
        return $user->createToken('auth_token')->plainTextToken;
    }

    private function getUserPermissions(User $user): array
    {
        return $user->getPermissionNames()->toArray();
    }

    private function validateLogin(string $email, string $password): void
    {
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            throw ValidationException::withMessages([
                __('These credentials do not match our records')
            ]);
        }
    }


    private function ensureThatUserHasRoles(User $user): void
    {
        if ($user->hasAnyRole([Role::MANAGER, Role::DEVELOPER, Role::ADMIN])) {
            throw ValidationException::withMessages([
                'The user does not have the required roles'
            ]);
        }
    }

    private function ensureThatUserIsNotBlocked(User $user): void
    {
        if ($user->isLoginBlocked()) {
            throw ValidationException::withMessages([
                'These credentials do not match our records'
            ]);
        }
    }

}
