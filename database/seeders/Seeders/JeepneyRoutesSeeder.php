<?php

namespace Database\Seeders\Seeders;

use App\Models\JeepneyRoutes;
use Illuminate\Database\Seeder;

class JeepneyRoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JeepneyRoutes::factory(25)->create();
    }
}
