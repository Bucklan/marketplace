<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Enums as Enums;

class DeveloperSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->developer()->create();

        $user->givePermissionTo([
            Enums\User\Permission::DASHBOARD,
            Enums\User\Permission::ORDERS,
            Enums\User\Permission::CLIENTS,
            Enums\User\Permission::MANAGERS,
            Enums\User\Permission::COURIERS,
            Enums\User\Permission::CATEGORIES,
            Enums\User\Permission::GENRES,
            Enums\User\Permission::PRODUCTS,
            Enums\User\Permission::CITIES,
            Enums\User\Permission::NOTIFICATIONS,
            Enums\User\Permission::BANNERS,
            Enums\User\Permission::SETTINGS,
            Enums\User\Permission::PROMOCODES,
            Enums\User\Permission::HELP_SECTIONS,
            Enums\User\Permission::CONTACTS,
            Enums\User\Permission::BONUSES,
            Enums\User\Permission::DELIVERIES,
        ]);
    }
}
