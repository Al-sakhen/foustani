<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class FacetValue extends Model
{
    protected $fillable = [
        'facet_id',
        'name_ar',
        'name_en',
        'slug',
        'status',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
        ];
    }

    public function facet(): BelongsTo
    {
        return $this->belongsTo(Facet::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_facet_value')->withTimestamps();
    }
}
