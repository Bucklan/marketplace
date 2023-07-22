<?php

namespace App\Services\Admin\Actions\Client;

use App\Models\User;
use App\Services\Admin\Contracts\BlockUser;
use App\Tasks\Client\BlockTask;
use DB;

class BlockAction implements BlockUser
{
    public function execute(User $client)
    {
        DB::transaction(function () use ($client) {
            app(BlockTask::class)->run($client);
            $client->tokens()->delete();
        });
    }

}
