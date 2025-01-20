<?php

declare(strict_types=1);

namespace App\Pets\DTO;

readonly class PetResponseDTO
{
    public function __construct(
        public string $name,
        public array $photoUrls,
        public int $id,
        public ?CategoryDTO $category = null,
        public ?array $tags = null,
        public ?string $status = null,
    ) {
    }

    public static function from(array $data): self
    {
        return new self(
            name: $data['name'],
            photoUrls: $data['photoUrls'],
            id: (int) $data['id'],
            category: isset($data['category']) ? CategoryDTO::from($data['category']['id']) : null,
            tags: isset($data['tags']) ? TagDTO::from($data['tags']) : null,
            status: $data['status'] ?? null,
        );
    }
}
