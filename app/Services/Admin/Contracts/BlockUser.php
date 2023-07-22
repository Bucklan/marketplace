<?php

namespace App\Services\Admin\Contracts;

use App\Models\User;

interface BlockUser
{
public function execute(User $client);
}
