<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\ProductVariantStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariant extends Model
{
    protected $fillable = [
        'public_id',
        'product_id',
        'color_id',
        'size_id',
        'sku',
        'barcode',
        'status',
        'weight_grams',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'status' => ProductVariantStatus::class,
            'weight_grams' => 'integer',
            'sort_order' => 'integer',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

    public function variantPrices(): HasMany
    {
        return $this->hasMany(VariantPrice::class);
    }

    public function inventoryItems(): HasMany
    {
        return $this->hasMany(InventoryItem::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(ProductMedia::class);
    }
}
