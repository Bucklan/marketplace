<?php

namespace App\Services\Admin\Actions\Client;

use App\Enums as Enums;
use App\Services\Admin\Contracts\GetAllClients;
use App\Tasks as Tasks;

class GetAllAction implements GetAllClients
{
    public function execute()
    {
       return app(Tasks\Client\GetAllClientsTask::class)->run(
            [Enums\User\Role::CLIENT],
            ['id', 'name', 'email', 'login_blocked_at', 'created_at'],
        );
    }
}
