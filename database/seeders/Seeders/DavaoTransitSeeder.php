<?php

namespace Database\Seeders\Seeders;

use App\Models\JeepneyRoutes;
use App\Models\Pins;
use App\Models\Stop;
use Clickbar\Magellan\Data\Geometries\Point;
use Illuminate\Database\Seeder;

class DavaoTransitSeeder extends Seeder
{
    public function run(): void
    {
        $transitData = [
            'Mintal' => [
                'color_hex' => '#28a745', // Green
                'is_loop' => false,
                // Hubs: Only the major boarding/alighting areas (Used for A-to-B routing)
                'hubs' => [
                    ['name' => 'Mintal Terminal', 'lat' => 7.0821, 'lng' => 125.4980],
                    ['name' => 'SM Ecoland', 'lat' => 7.0543, 'lng' => 125.5862],
                    ['name' => 'Roxas Avenue', 'lat' => 7.0707, 'lng' => 125.6120],
                ],
                // Path: Every little step along the way, including landmarks (Used for drawing maps & verifying)
                'path' => [
                    ['name' => 'Mintal Terminal', 'lat' => 7.0821, 'lng' => 125.4980, 'is_major' => true],
                    ['name' => 'Jollibee Mintal', 'lat' => 7.0835, 'lng' => 125.5002, 'is_major' => false],
                    ['name' => 'UP Mindanao Kanto', 'lat' => 7.0848, 'lng' => 125.5050, 'is_major' => false],
                    ['name' => 'Matina Crossing', 'lat' => 7.0682, 'lng' => 125.5781, 'is_major' => true],
                    ['name' => 'SM Ecoland', 'lat' => 7.0543, 'lng' => 125.5862, 'is_major' => true],
                    ['name' => 'Ateneo de Davao', 'lat' => 7.0725, 'lng' => 125.6131, 'is_major' => false],
                    ['name' => 'Roxas Avenue', 'lat' => 7.0707, 'lng' => 125.6120, 'is_major' => true],
                ],
            ],
            'Buhangin via JP Laurel' => [
                'color_hex' => '#FF5733',
                'is_loop' => false,
                'hubs' => [
                    ['name' => 'Buhangin Gym', 'lat' => 7.1026, 'lng' => 125.6159],
                    ['name' => 'Abreeza Mall', 'lat' => 7.0863, 'lng' => 125.6143],
                    ['name' => 'Roxas Avenue', 'lat' => 7.0707, 'lng' => 125.6120],
                ],
                'path' => [
                    ['name' => 'Buhangin Gym', 'lat' => 7.1026, 'lng' => 125.6159, 'is_major' => true],
                    ['name' => 'Milan', 'lat' => 7.0980, 'lng' => 125.6150, 'is_major' => false],
                    ['name' => 'Abreeza Mall', 'lat' => 7.0863, 'lng' => 125.6143, 'is_major' => true],
                    ['name' => 'Victoria Plaza', 'lat' => 7.0822, 'lng' => 125.6135, 'is_major' => false],
                    ['name' => 'Gaisano Mall', 'lat' => 7.0768, 'lng' => 125.6138, 'is_major' => true],
                    ['name' => 'Roxas Avenue', 'lat' => 7.0707, 'lng' => 125.6120, 'is_major' => true],
                ],
            ],
            'Roxas to SME' => [
                'color_hex' => '#007BFF', // Blue
                'is_loop' => false,
                'hubs' => [
                    ['name' => 'Roxas Avenue', 'lat' => 7.0707, 'lng' => 125.6120],
                    ['name' => 'SM Ecoland', 'lat' => 7.0543, 'lng' => 125.5862],
                ],
                'path' => [
                    ['name' => 'Roxas Avenue', 'lat' => 7.0707, 'lng' => 125.6120, 'is_major' => true],
                    ['name' => 'Almendras', 'lat' => 7.0617, 'lng' => 125.6108, 'is_major' => false],
                    ['name' => 'Felcris', 'lat' => 7.0595, 'lng' => 125.6091, 'is_major' => false],
                    ['name' => 'VXI Kanto Sandawa', 'lat' => 7.0575, 'lng' => 125.6062, 'is_major' => false],
                    ['name' => 'Tulip Drive', 'lat' => 7.0518, 'lng' => 125.5902, 'is_major' => false],
                    ['name' => 'SM Ecoland', 'lat' => 7.0543, 'lng' => 125.5862, 'is_major' => true],
                ],
            ],
        ];

        foreach ($transitData as $routeName => $data) {

            // 1. Create the Jeepney Route
            $route = JeepneyRoutes::create([
                'name' => $routeName,
                'color_hex' => $data['color_hex'],
                'is_loop' => $data['is_loop'],
            ]);

            // 2. Process the Hubs (Populate `pins` for routing logic)
            foreach ($data['hubs'] as $hubData) {
                Pins::firstOrCreate(
                    [
                        'label' => $hubData['name'],
                        'jeepney_route_id' => $route->id,
                    ],
                    [
                        'geography_point' => Point::makeGeodetic($hubData['lat'], $hubData['lng']),
                        'is_major_hub' => true, // Hubs are naturally major
                    ]
                );
            }

            // 3. Process the Breadcrumb Path (Populate `stops` with order for maps and landmarks)
            $order = 1;
            foreach ($data['path'] as $stopData) {
                Stop::create([
                    'jeepney_route_id' => $route->id,
                    'name' => $stopData['name'],
                    'location' => Point::makeGeodetic($stopData['lat'], $stopData['lng']),
                    'order' => $order, // The sequence is preserved here!
                    'is_major_stop' => $stopData['is_major'],
                ]);
                $order++;
            }
        }

    }
}
