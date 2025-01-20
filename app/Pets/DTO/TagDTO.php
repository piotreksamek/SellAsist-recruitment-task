<?php

declare(strict_types=1);

namespace App\Pets\DTO;

use App\Pets\Enum\Tag;

readonly class TagDTO
{
    public function __construct(
        public int $id,
        public string $name,
    ) {
    }

    public static function from(array $tags): array
    {
        $results = [];

        foreach($tags as $tag) {
            $tagId = is_array($tag) ? (int) $tag['id'] : (int) $tag;

            $results[] = new self(
                id: $tagId,
                name: Tag::from($tagId)->name
            );
        }

        return $results;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
