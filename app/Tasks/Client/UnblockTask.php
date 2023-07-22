<?php

namespace App\Tasks\Client;

use App\Models\User;

class UnblockTask
{
    public function run(User $model)
    {
        $model->login_blocked_at = null;
        $model->saveQuietly();
    }
}
