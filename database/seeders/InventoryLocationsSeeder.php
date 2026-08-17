<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\InventoryLocation;
use Illuminate\Database\Seeder;

class InventoryLocationsSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            ['code' => 'WH-01', 'name' => 'Main Warehouse', 'status' => 'active'],
            ['code' => 'RET-01', 'name' => 'Retail Store', 'status' => 'active'],
            ['code' => 'DC-01', 'name' => 'Distribution Center', 'status' => 'active'],
        ];

        foreach ($locations as $location) {
            InventoryLocation::query()->updateOrCreate(
                ['code' => $location['code']],
                $location,
            );
        }
    }
}
