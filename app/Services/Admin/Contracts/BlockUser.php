<?php

namespace App\Services\Admin\Contracts;

use App\Models\User;

interface BlockClient
{
public function execute(User $client);
}
