<?php

namespace App\Services\Client\Dto\Register;

use Spatie\DataTransferObject\DataTransferObject;

class RegisterDto extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $password;

}
