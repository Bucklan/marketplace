<?php

namespace App\Services\Admin\Actions\Manager;

use App\Enums as Enums;
use App\Services\Admin\Contracts\GetAllClients;
use App\Services\Admin\Contracts\GetAllManagers;
use App\Tasks as Tasks;

class GetAllAction implements GetAllManagers
{
    public function execute()
    {
        return app(Tasks\Manager\GetAllManagersTask::class)->run(
            [Enums\User\Role::MANAGER],
            ['users.id', 'users.name', 'users.email', 'users.login_blocked_at', 'users.created_at'],
        );
    }
}
