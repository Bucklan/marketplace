<?php

namespace App\Policies;

use App\Enums\User\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;
    public function viewAny(User $user) // View all Admins
    {
        return $user->hasAnyRole([Role::MANAGER,Role::ADMIN,Role::DEVELOPER]);
    }
    public function forAdmin(User $user) //view only admin
    {
        return $user->hasRole(Role::ADMIN);
    }
    public function forManagerAndAdmin(User $user) //only manager and admin
    {
        return $user->hasAnyRole([Role::MANAGER,Role::ADMIN]);
    }
}
