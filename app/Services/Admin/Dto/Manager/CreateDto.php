<?php

namespace App\Services\Admin\Dto\Manager;

use Spatie\DataTransferObject\DataTransferObject;

class CreateDto extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $password;
    public array $permissions;
}
