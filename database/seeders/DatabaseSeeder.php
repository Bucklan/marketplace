<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ManagerSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(DeveloperSeeder::class);
    }
}
