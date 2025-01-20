<?php

declare(strict_types=1);

namespace App\Pets\Enum;

enum Category: int
{
    case DOG = 1;
    case CAT = 2;
    case COW = 3;
}
