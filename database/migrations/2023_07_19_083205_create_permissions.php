<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\PermissionRegistrar;
use App\Models\Permission;
use App\Enums as Enums;

class CreatePermissions extends Migration
{
    public function up(): void
    {
        // RESET CACHED ROLES AND PERMISSIONS
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => Enums\User\Permission::ORDERS]);
        Permission::create(['name' => Enums\User\Permission::MANAGERS]);
        Permission::create(['name' => Enums\User\Permission::CATEGORIES]);
        Permission::create(['name' => Enums\User\Permission::PRODUCTS]);
    }

    public function down(): void
    {
        // RESET CACHED ROLES AND PERMISSIONS
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::query()->where(['name' => Enums\User\Permission::ORDERS])->delete();
        Permission::query()->where(['name' => Enums\User\Permission::MANAGERS])->delete();
        Permission::query()->where(['name' => Enums\User\Permission::CATEGORIES])->delete();
        Permission::query()->where(['name' => Enums\User\Permission::PRODUCTS])->delete();
    }
}

