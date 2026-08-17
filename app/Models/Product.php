<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\HasLocalizedAttributes;
use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasLocalizedAttributes;
    use SoftDeletes;

    protected $fillable = [
        'public_id',
        'name_ar',
        'name_en',
        'slug_ar',
        'slug_en',
        'short_description_ar',
        'short_description_en',
        'description_ar',
        'description_en',
        'seo_title_ar',
        'seo_title_en',
        'seo_description_ar',
        'seo_description_en',
        'status',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => ProductStatus::class,
            'published_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class)->withPivot('sort_order')->withTimestamps();
    }

    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(Collection::class)->withPivot('sort_order')->withTimestamps();
    }

    public function facetValues(): BelongsToMany
    {
        return $this->belongsToMany(FacetValue::class, 'product_facet_value')->withTimestamps();
    }

    public function media(): HasMany
    {
        return $this->hasMany(ProductMedia::class);
    }

    public function wishlistItems(): HasMany
    {
        return $this->hasMany(WishlistItem::class);
    }
}
