<?php

declare(strict_types=1);

namespace App\DTO;

class Academy
{
    private ?string $title;
    private ?string $academyImageUrl;
    private ?string $slug;
    private ?string $description;
    private ?string $academyUrl;

    public function __construct(
        ?string $title,
        ?string $academyImageUrl,
        ?string $slug,
        ?string $description,
        ?string $academyUrl = null,
    ) {
        $this->title = $title;
        $this->academyImageUrl = $academyImageUrl;
        $this->slug = $slug;
        $this->description = $description;
        $this->academyUrl = $academyUrl;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getAcademyImageUrl(): ?string
    {
        return $this->academyImageUrl;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getAcademyUrl(): ?string
    {
        return $this->academyUrl;
    }
}
