<?php

namespace App\Services\Client\Actions\Login;

use App\Enums\User\Role as Role;
use App\Models\User;
use App\Services\Client\Contracts\Login;
use App\Tasks\Client\FindByEmailTask;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Throwable;


class LoginAction implements Login
{
    /**
     * @throws ValidationException
     * @throws Throwable
     */
    public function execute(string $email, string $password): array
    {
        $user = app(FindByEmailTask::class)->run($email);
        if (!empty($user)) {
            $this->validateLogin($email, $password);
        }
        $this->ensureThatUserHasRoles($user);
        $this->ensureThatUserIsNotBlocked($user);
        DB::transaction(function () use ($user) {
            $user->tokens()->delete();
        });

        return [
            'token' => $user->createToken('auth_token')->plainTextToken,
            'permissions' => $user->getPermissionNames()->toArray()
        ];
    }

    /**
     * @throws ValidationException
     */
    private function validateLogin(string $email, string $password): void
    {

        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            throw ValidationException::withMessages([
                __('These credentials do not match our records')
            ]);
        }
    }

    /**
     * @throws ValidationException
     */
    private function ensureThatUserHasRoles(User $user): void
    {
        if ($user->hasAnyRole([Role::MANAGER, Role::DEVELOPER, Role::ADMIN])) {
            throw ValidationException::withMessages([
                'email' => 'These credentials do not match our records',
            ]);
        }
    }

    /**
     * @throws ValidationException
     */
    private function ensureThatUserIsNotBlocked(User $user): void
    {
        if ($user->isLoginBlocked()) {
            throw ValidationException::withMessages([
                'These credentials do not match our records'
            ]);
        }
    }

}
