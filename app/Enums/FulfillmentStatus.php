<?php

declare(strict_types=1);

namespace App\Enums;

enum FulfillmentStatus: string
{
    case UNFULFILLED = 'unfulfilled';
    case PARTIALLY_FULFILLED = 'partially_fulfilled';
    case FULFILLED = 'fulfilled';

    public function label(): string
    {
        return match ($this) {
            self::UNFULFILLED => 'Unfulfilled',
            self::PARTIALLY_FULFILLED => 'Partially Fulfilled',
            self::FULFILLED => 'Fulfilled',
        };
    }
}
