<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\MediaType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductMedia extends Model
{
    protected $fillable = [
        'public_id',
        'product_id',
        'product_variant_id',
        'disk',
        'path',
        'mime_type',
        'alt_text_ar',
        'alt_text_en',
        'type',
        'sort_order',
        'is_primary',
    ];

    protected function casts(): array
    {
        return [
            'type' => MediaType::class,
            'sort_order' => 'integer',
            'is_primary' => 'boolean',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function productVariant(): BelongsTo
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
