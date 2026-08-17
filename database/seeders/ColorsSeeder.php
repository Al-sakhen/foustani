<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    public function run(): void
    {
        $colors = [
            ['name_ar' => 'أسود', 'name_en' => 'Black', 'slug_ar' => 'aswad', 'slug_en' => 'black', 'hex' => '#000000', 'sort_order' => 1, 'status' => 'active'],
            ['name_ar' => 'أبيض', 'name_en' => 'White', 'slug_ar' => 'abyad', 'slug_en' => 'white', 'hex' => '#FFFFFF', 'sort_order' => 2, 'status' => 'active'],
            ['name_ar' => 'أحمر', 'name_en' => 'Red', 'slug_ar' => 'ahmar', 'slug_en' => 'red', 'hex' => '#DC2626', 'sort_order' => 3, 'status' => 'active'],
            ['name_ar' => 'أزرق', 'name_en' => 'Blue', 'slug_ar' => 'azraq', 'slug_en' => 'blue', 'hex' => '#2563EB', 'sort_order' => 4, 'status' => 'active'],
            ['name_ar' => 'بني', 'name_en' => 'Brown', 'slug_ar' => 'buni', 'slug_en' => 'brown', 'hex' => '#8B5E3C', 'sort_order' => 5, 'status' => 'active'],
        ];

        foreach ($colors as $color) {
            Color::query()->updateOrCreate(
                ['slug_en' => $color['slug_en']],
                $color,
            );
        }
    }
}
