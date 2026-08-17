<?php

declare(strict_types=1);

namespace App\Enums;

enum InventoryMovementType: string
{
    case PURCHASE = 'purchase';
    case SALE = 'sale';
    case RETURN = 'return';
    case ADJUSTMENT = 'adjustment';
    case DAMAGE = 'damage';

    public function label(): string
    {
        return match ($this) {
            self::PURCHASE => 'Purchase',
            self::SALE => 'Sale',
            self::RETURN => 'Return',
            self::ADJUSTMENT => 'Adjustment',
            self::DAMAGE => 'Damage',
        };
    }
}
