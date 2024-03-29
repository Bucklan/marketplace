<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Enums as Enums;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
        $user->assignRole(Enums\User\Role::ADMIN);

        $user->givePermissionTo([
            Enums\User\Permission::ORDERS,
            Enums\User\Permission::MANAGERS,
            Enums\User\Permission::CATEGORIES,
            Enums\User\Permission::PRODUCTS,
            Enums\User\Permission::CLIENTS,
        ]);
    }
}
