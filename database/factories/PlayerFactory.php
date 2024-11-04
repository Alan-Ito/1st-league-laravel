<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'position' => $this->faker->randomElement(['Forward', 'Midfielder', 'Defender', 'Goalkeeper']),
            'team' => $this->faker->company,
            'age' => $this->faker->numberBetween(18, 40),
        ];
    }
}
