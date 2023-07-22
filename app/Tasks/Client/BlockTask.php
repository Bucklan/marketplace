<?php

namespace App\Tasks\Client;

use App\Models\User;

class BlockTask
{
    public function run(User $model)
    {
        $model->login_blocked_at = now()->toDateTimeString();
        $model->saveQuietly();
    }
}
