<?php

namespace App\Services\Admin\Contracts;

use App\Models\User;
use App\Services\Admin\Dto\Manager\UpdateDto;

interface UpdateManager
{
public function execute(User $manager,UpdateDto $dto);
}
