<?php

namespace App\Enums\Order;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class Status extends Enum implements LocalizedEnum
{
    const CREATED = '1';
    const CONFIRMED = '2';
    const CANCELED = '3';
}
