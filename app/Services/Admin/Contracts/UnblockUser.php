<?php

namespace App\Services\Admin\Contracts;

use App\Models\User;

interface UnblockClient
{
public function execute(User $client);
}
