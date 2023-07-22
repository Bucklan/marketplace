<?php

namespace App\Services\Admin\Actions\Client;

use App\Models\User;
use App\Services\Admin\Contracts\UnblockUser;
use App\Tasks\Client\UnblockTask;

class UnblockAction implements UnblockUser
{
    public function execute(User $client)
    {
        app(UnblockTask::class)->run($client);

    }
}
