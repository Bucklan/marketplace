<?php

namespace App\Enums\User;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class Permission extends Enum implements LocalizedEnum
{
    const ORDERS = 'orders';
    const CLIENTS = 'clients';
    const MANAGERS = 'managers';
    const CATEGORIES = 'categories';
    const PRODUCTS = 'products';


    public static function asAvailableSelectArray(): array
    {
        return [
            self::ORDERS => self::getDescription(self::ORDERS),
            self::CLIENTS => self::getDescription(self::CLIENTS),
            self::MANAGERS => self::getDescription(self::MANAGERS),
            self::CATEGORIES => self::getDescription(self::CATEGORIES),
            self::PRODUCTS => self::getDescription(self::PRODUCTS),
        ];
    }
}
