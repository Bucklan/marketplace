<?php

namespace App\Services\Admin\Contracts;

use App\Models\User;

interface UnblockUser
{
public function execute(User $client);
}
