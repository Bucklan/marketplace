<?php

namespace App\Services\Admin\Actions\Manager;

use App\Enums as Enums;
use App\Models\User;
use App\Services\Admin\Contracts\StoreManager;
use App\Services\Admin\Dto\Manager\CreateDto;
use DB;

class StoreAction implements StoreManager
{
    public function execute(CreateDto $dto)
    {
        DB::transaction(function () use ($dto) {
            $user = $this->createManager($dto);
            $this->assignRole($user);
            $this->givePermissions($user, $dto);
        });
    }

    private function createManager(CreateDto $dto)
    {
        return User::create($dto->except('permissions')->toArray() + [
                'email_verified_at' => now()->toDateTimeString(),
            ]);
    }

    private function assignRole(User $user)
    {
        $user->assignRole(Enums\User\Role::MANAGER);
    }

    private function givePermissions(User $user, CreateDto $dto)
    {
        $user->givePermissionTo(array_merge($dto->permissions));
    }
}
