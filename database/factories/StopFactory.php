<?php

namespace Database\Factories;

use App\Models\JeepneyRoutes;
use App\Models\Stop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Stop>
 */
class StopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jeepney_route_id' => JeepneyRoutes::inRandomOrder()->first()?->id,
            'name' => $this->faker->streetName(),
            'location' => 'POINT('.$this->faker->longitude().' '.$this->faker->latitude().')',
            'order' => $this->faker->numberBetween(1, 10),
            'is_major_stop' => $this->faker->boolean(),
        ];
    }
}
