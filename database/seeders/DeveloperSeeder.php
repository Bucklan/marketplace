<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Enums as Enums;
use Illuminate\Support\Facades\Hash;

class DeveloperSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Developer',
            'email' => 'developer@gmail.com',
            'password' => 'developer123',
        ]);
        $user->assignRole(Enums\User\Role::DEVELOPER);

        $user->givePermissionTo([
            Enums\User\Permission::ORDERS,
            Enums\User\Permission::CATEGORIES,
            Enums\User\Permission::PRODUCTS,
        ]);
    }
}
