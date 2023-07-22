<?php

namespace App\Services\Admin\Actions\Manager;

use App\Models\User;
use App\Services\Admin\Contracts\UpdateManager;
use App\Services\Admin\Dto\Manager\UpdateDto;
use DB;

class UpdateAction implements UpdateManager
{
    public function execute(User $manager, UpdateDto $dto)
    {
        DB::transaction(function () use ($manager,$dto) {
            $this->updateManager($manager, $dto);
            $this->syncPermissions($manager, $dto);
        });
    }

    private function updateManager(User $manager, UpdateDto $dto)
    {
        $manager->update($dto->except('permissions')->toArray());
    }
    private function syncPermissions(User $manager, UpdateDto $dto): void
    {
        $manager->syncPermissions(array_merge($dto->permissions));
    }
}
