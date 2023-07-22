<?php

namespace App\Enums\User;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class Role extends Enum implements LocalizedEnum
{
    const SUPER_ADMIN = 'super_admin';
    const DEVELOPER = 'developer';
    const MANAGER = 'manager';
    const COURIER = 'courier';
}
