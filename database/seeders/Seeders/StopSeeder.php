<?php

namespace Database\Seeders\Seeders;

use App\Models\Stop;
use Illuminate\Database\Seeder;

class StopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stop::factory(25)->create();
    }
}
