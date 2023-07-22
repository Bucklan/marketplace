<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class UserObserver
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function creating(User $user): void
    {
        if (!request()->isNotFilled('password')) {
            $user->password = Hash::make(request()->get('password'));
            $user->password_changed_at = now()->toDateTimeString();
        } else {
            $user->password = Hash::make($user->password);
        }
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function updating(User $user): void
    {
        if (!request()->isNotFilled('password')) {
            $user->password = Hash::make(request()->get('password'));
            $user->password_changed_at = now()->toDateTimeString();
        } else {
            $user->password = $user->getOriginal('password');
        }
    }
}
