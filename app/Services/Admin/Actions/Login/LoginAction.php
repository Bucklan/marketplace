<?php

namespace App\Services\Admin\Actions\Login;

use App\Enums\User\Role as Role;
use App\Models\User;
use App\Services\Admin\Contracts\Login;
use App\Tasks\Client\FindByEmailTask;
use Auth;
use Illuminate\Validation\ValidationException;


class LoginAction implements Login
{

    public function execute(string $email, string $password)
    {
        if (Auth::check()) {
            return redirect()->intended('/admin/user/products');
        }
        $user = app(FindByEmailTask::class)->run($email);
        $this->validateLogin($email, $password);
        $this->ensureThatUserIsNotBlocked($user);
        $this->ensureThatUserHasRoles($user);
            return redirect()->intended('/admin/user/products');
    }


    private function validateLogin(string $email, string $password): void
    {
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            throw ValidationException::withMessages([
                'These credentials do not match our records'
            ]);
        }
    }



    private function ensureThatUserHasRoles(User $user): void
    {
        if (!$user->hasAnyRole([Role::MANAGER, Role::DEVELOPER, Role::ADMIN])) {
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
