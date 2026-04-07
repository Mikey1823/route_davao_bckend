<?php

namespace Database\Factories;

use App\Models\JeepneyRoutes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<JeepneyRoutes>
 */
class JeepneyRoutesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->streetName(),
            'route_number' => $this->faker->numberBetween(1, 10),
            'is_loop' => $this->faker->boolean(80),
        ];
    }
}
