<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\PromotionStatus;
use App\Enums\PromotionType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Promotion extends Model
{
    protected $fillable = [
        'public_id',
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'type',
        'value',
        'minimum_order_amount',
        'maximum_discount',
        'starts_at',
        'ends_at',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'type' => PromotionType::class,
            'status' => PromotionStatus::class,
            'value' => 'integer',
            'minimum_order_amount' => 'integer',
            'maximum_discount' => 'integer',
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
        ];
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'promotion_product')->withTimestamps();
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'promotion_category')->withTimestamps();
    }

    public function coupons(): HasMany
    {
        return $this->hasMany(Coupon::class);
    }
}
