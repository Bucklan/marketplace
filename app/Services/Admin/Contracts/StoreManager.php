<?php

namespace App\Services\Admin\Contracts;

use App\Services\Admin\Dto\Manager\CreateDto;

interface StoreManager
{
public function execute(CreateDto $dto);
}
