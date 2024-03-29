<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Enums as Enums;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2a$12$BN8Y92vZbAWvzzxnyXdkjeOHt3BNPMTnjAtNStUI6zOjeeDvqqt4O',
            'remember_token' => Str::random(10),
        ];
    }

//    public function manager(): Factory
//    {
//        return $this->state(function (array $attributes) {
//            return [
//                'name' => 'Manager',
//                'email' => 'manager@gmail.com',
//                'password' => 'manager123',
//            ];
//        })->afterCreating(function (User $user){
//            $user->assignRole(Enums\User\Role::MANAGER);
//        });
//    }

//    public function admin(): Factory
//    {
//        return $this->state(function (array $attributes) {
//            return [
//                'name' => 'Admin',
//                'email' => 'admin@gmail.com',
//                'password' => 'admin123',
//            ];
//        })->afterCreating(function (User $user){
//            $user->assignRole(Enums\User\Role::ADMIN);
//        });
//    }
}
