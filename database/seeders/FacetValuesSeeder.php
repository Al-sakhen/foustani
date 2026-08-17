<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Facet;
use App\Models\FacetValue;
use Illuminate\Database\Seeder;

class FacetValuesSeeder extends Seeder
{
    public function run(): void
    {
        $facetMap = [];

        foreach (['occasion', 'fabric', 'length', 'sleeve', 'neckline'] as $slug) {
            $facet = Facet::query()->firstOrCreate(
                ['slug' => $slug],
                ['name_ar' => $slug, 'name_en' => $slug, 'filterable' => true, 'status' => 'active', 'sort_order' => 1],
            );

            $facetMap[$slug] = $facet->id;
        }

        $values = [
            ['facet_id' => $facetMap['occasion'], 'name_ar' => 'إحتفالية', 'name_en' => 'Formal', 'slug' => 'formal', 'status' => 'active', 'sort_order' => 1],
            ['facet_id' => $facetMap['occasion'], 'name_ar' => 'يومية', 'name_en' => 'Casual', 'slug' => 'casual', 'status' => 'active', 'sort_order' => 2],
            ['facet_id' => $facetMap['fabric'], 'name_ar' => 'ساتان', 'name_en' => 'Satin', 'slug' => 'satin', 'status' => 'active', 'sort_order' => 1],
            ['facet_id' => $facetMap['fabric'], 'name_ar' => 'كتان', 'name_en' => 'Cotton', 'slug' => 'cotton', 'status' => 'active', 'sort_order' => 2],
            ['facet_id' => $facetMap['length'], 'name_ar' => 'بالكامل', 'name_en' => 'Full Length', 'slug' => 'full-length', 'status' => 'active', 'sort_order' => 1],
            ['facet_id' => $facetMap['sleeve'], 'name_ar' => 'كم طويل', 'name_en' => 'Long Sleeve', 'slug' => 'long-sleeve', 'status' => 'active', 'sort_order' => 1],
            ['facet_id' => $facetMap['neckline'], 'name_ar' => 'V شكل', 'name_en' => 'V Neck', 'slug' => 'v-neck', 'status' => 'active', 'sort_order' => 1],
        ];

        foreach ($values as $value) {
            FacetValue::query()->updateOrCreate(
                ['facet_id' => $value['facet_id'], 'slug' => $value['slug']],
                $value,
            );
        }
    }
}
