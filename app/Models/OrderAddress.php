<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderAddress extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'type',
        'first_name',
        'last_name',
        'phone',
        'country_code',
        'city',
        'area',
        'street',
        'building',
        'floor',
        'apartment',
        'postal_code',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
