<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Facet extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'filterable',
        'status',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'filterable' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function values(): HasMany
    {
        return $this->hasMany(FacetValue::class);
    }
}
