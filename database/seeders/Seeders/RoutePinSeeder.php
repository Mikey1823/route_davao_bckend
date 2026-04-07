<?php

namespace Database\Seeders\Seeders;

use App\Models\RoutePin;
use Illuminate\Database\Seeder;

class RoutePinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoutePin::factory(25)->create();
    }
}
