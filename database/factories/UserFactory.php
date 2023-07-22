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

    public function developer(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Разработчик',
                'email' => 'developer@kosmos.kz',
                'password' => 'M5E76*^EHr3vb%Xq&KAatvKwT7Jmrsvs',
            ];
        })->afterCreating(function (User $user){
            $user->assignRole(Enums\User\Role::DEVELOPER);
        });
    }

    public function admin(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Супер админ',
                'email' => 'admin@kosmos.kz',
                'password' => 'M5E76*^EHr3vb%Xq&KAatvKwT7Jmrsvs',
            ];
        })->afterCreating(function (User $user){
            $user->assignRole(Enums\User\Role::SUPER_ADMIN);
        });
    }
}
