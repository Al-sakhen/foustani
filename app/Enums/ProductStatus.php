<?php

declare(strict_types=1);

namespace App\Enums;

enum ProductStatus: string
{
    case DRAFT = 'draft';
    case ACTIVE = 'active';
    case ARCHIVED = 'archived';
    case UNPUBLISHED = 'unpublished';

    public function label(): string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::ACTIVE => 'Active',
            self::ARCHIVED => 'Archived',
            self::UNPUBLISHED => 'Unpublished',
        };
    }
}
