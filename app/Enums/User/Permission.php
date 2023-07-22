<?php

namespace App\Enums\User;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

final class Permission extends Enum implements LocalizedEnum
{
    const DASHBOARD = 'dashboard';
    const ORDERS = 'orders';
    const CLIENTS = 'clients';
    const MANAGERS = 'managers';
    const COURIERS = 'couriers';
    const CATEGORIES = 'categories';
    const GENRES = 'genres';
    const PRODUCTS = 'products';
    const CITIES = 'cities';
    const NOTIFICATIONS = 'notifications';
    const BANNERS = 'banners';
    const SETTINGS = 'settings';
    const PROMOCODES = 'promocodes';
    const HELP_SECTIONS = 'help_sections';
    const CONTACTS = 'contacts';
    const DELIVER = 'deliver';
}
