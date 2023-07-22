<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Enums as Enums;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->admin()->create();

        $user->givePermissionTo([
            Enums\User\Permission::ORDERS,
            Enums\User\Permission::MANAGERS,
            Enums\User\Permission::CATEGORIES,
            Enums\User\Permission::PRODUCTS,
        ]);
    }
}
