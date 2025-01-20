<?php

declare(strict_types=1);

namespace App\Pets\DTO;

use App\Pets\Enum\Category;

readonly class CategoryDTO
{
    public function __construct(
        public int $id,
        public string $name,
    ) {
    }

    public static function from(int $categoryId): self
    {
        return new self(
            id: $categoryId,
            name: Category::from($categoryId)->name,
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
