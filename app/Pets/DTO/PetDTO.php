<?php

declare(strict_types=1);

namespace App\Pets\DTO;

readonly class PetDTO
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
            id: isset($data['id']) ? (int) $data['id'] : rand(1, 10000),
            category: isset($data['category']) ? CategoryDTO::from((int) $data['category']) : null,
            tags: isset($data['tags']) ? TagDTO::from($data['tags']) : null,
            status: $data['status'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'photoUrls' => $this->photoUrls,
            'category' => $this->category?->toArray(),
            'tags' => $this->tags
                ? array_map(fn(TagDTO $tag) => $tag->toArray(), $this->tags)
                : null,
            'status' => $this->status,
        ];
    }
}
