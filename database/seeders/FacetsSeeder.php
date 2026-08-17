<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Facet;
use Illuminate\Database\Seeder;

class FacetsSeeder extends Seeder
{
    public function run(): void
    {
        $facets = [
            ['name_ar' => 'المناسبة', 'name_en' => 'Occasion', 'slug' => 'occasion', 'filterable' => true, 'status' => 'active', 'sort_order' => 1],
            ['name_ar' => 'القماش', 'name_en' => 'Fabric', 'slug' => 'fabric', 'filterable' => true, 'status' => 'active', 'sort_order' => 2],
            ['name_ar' => 'الطول', 'name_en' => 'Length', 'slug' => 'length', 'filterable' => true, 'status' => 'active', 'sort_order' => 3],
            ['name_ar' => 'الأكمام', 'name_en' => 'Sleeve', 'slug' => 'sleeve', 'filterable' => true, 'status' => 'active', 'sort_order' => 4],
            ['name_ar' => 'الخط', 'name_en' => 'Neckline', 'slug' => 'neckline', 'filterable' => true, 'status' => 'active', 'sort_order' => 5],
        ];

        foreach ($facets as $facet) {
            Facet::query()->updateOrCreate(
                ['slug' => $facet['slug']],
                $facet,
            );
        }
    }
}
