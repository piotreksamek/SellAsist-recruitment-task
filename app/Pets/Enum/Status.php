<?php

declare(strict_types=1);

namespace App\Pets\Enum;

enum Status: string
{
    case AVAILABLE = 'available';
    case PENDING = 'pending';
    case SOLD = 'sold';
}
