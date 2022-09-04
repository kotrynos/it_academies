<?php

declare(strict_types=1);

namespace App\DTO;

class Category
{
    private ?string $title;

    private ?string $slug;

    public function __construct(?string $title, ?string $slug)
    {
        $this->title = $title;
        $this->slug = $slug;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }
}
