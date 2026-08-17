<?php

declare(strict_types=1);

namespace App\Enums;

enum InventoryReservationStatus: string
{
    case ACTIVE = 'active';
    case CONVERTED = 'converted';
    case RELEASED = 'released';
    case EXPIRED = 'expired';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::CONVERTED => 'Converted',
            self::RELEASED => 'Released',
            self::EXPIRED => 'Expired',
        };
    }
}
