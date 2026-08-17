<?php

declare(strict_types=1);

namespace App\Enums;

enum ShipmentStatus: string
{
    case PENDING = 'pending';
    case PACKED = 'packed';
    case SHIPPED = 'shipped';
    case IN_TRANSIT = 'in_transit';
    case DELIVERED = 'delivered';
    case FAILED = 'failed';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::PACKED => 'Packed',
            self::SHIPPED => 'Shipped',
            self::IN_TRANSIT => 'In Transit',
            self::DELIVERED => 'Delivered',
            self::FAILED => 'Failed',
        };
    }
}
