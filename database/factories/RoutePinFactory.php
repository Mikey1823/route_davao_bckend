<?php

namespace Database\Factories;

use App\Models\JeepneyRoutes;
use App\Models\Pins;
use App\Models\RoutePin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RoutePin>
 */
class RoutePinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pin_id' => Pins::inRandomOrder()->first()?->id,
            'jeepney_route_id' => JeepneyRoutes::inRandomOrder()->first()?->id,
        ];
    }
}
