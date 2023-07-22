<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(DeveloperSeeder::class);
        $this->call(SuperAdminSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
