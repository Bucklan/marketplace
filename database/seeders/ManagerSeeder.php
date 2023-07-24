<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Enums as Enums;

class ManagerSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => 'manager123',
        ]);
        $user->assignRole(Enums\User\Role::MANAGER);

        $user->givePermissionTo([
            Enums\User\Permission::ORDERS,
            Enums\User\Permission::CATEGORIES,
            Enums\User\Permission::PRODUCTS,
            Enums\User\Permission::CLIENTS,
        ]);
    }
}
