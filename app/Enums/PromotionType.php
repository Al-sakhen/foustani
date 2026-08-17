<?php

declare(strict_types=1);

namespace App\Enums;

enum PromotionType: string
{
    case PERCENTAGE = 'percentage';
    case FIXED_AMOUNT = 'fixed_amount';
    case FREE_SHIPPING = 'free_shipping';

    public function label(): string
    {
        return match ($this) {
            self::PERCENTAGE => 'Percentage',
            self::FIXED_AMOUNT => 'Fixed Amount',
            self::FREE_SHIPPING => 'Free Shipping',
        };
    }
}
