<?php

namespace Database\Seeders\Seeders;

use App\Models\Pins;
use Illuminate\Database\Seeder;

class PinsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pins::factory(25)->create();
    }
}
