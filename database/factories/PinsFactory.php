<?php

namespace Database\Factories;

use App\Models\Pins;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pins>
 */
class PinsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->city(),
            'geography_point' => 'POINT('.$this->faker->longitude().' '.$this->faker->latitude().')',
            'is_major_hub' => fake()->boolean(20),
        ];
    }
}
