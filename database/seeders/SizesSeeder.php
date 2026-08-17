<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizesSeeder extends Seeder
{
    public function run(): void
    {
        $sizes = [
            ['code' => 'XS', 'name_ar' => 'إكس إس', 'name_en' => 'XS', 'sort_order' => 1, 'status' => 'active'],
            ['code' => 'S', 'name_ar' => 'S', 'name_en' => 'S', 'sort_order' => 2, 'status' => 'active'],
            ['code' => 'M', 'name_ar' => 'M', 'name_en' => 'M', 'sort_order' => 3, 'status' => 'active'],
            ['code' => 'L', 'name_ar' => 'L', 'name_en' => 'L', 'sort_order' => 4, 'status' => 'active'],
            ['code' => 'XL', 'name_ar' => 'إكس إل', 'name_en' => 'XL', 'sort_order' => 5, 'status' => 'active'],
        ];

        foreach ($sizes as $size) {
            Size::query()->updateOrCreate(
                ['code' => $size['code']],
                $size,
            );
        }
    }
}
