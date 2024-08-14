<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nombres"=> $this->faker->name,
            "apellidos"=> $this->faker->lastName,
            "celular"=> $this->faker->phoneNumber,
            "correo"=> $this->faker->unique()->safeEmail,
        ];
    }
}
