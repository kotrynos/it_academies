<?php

declare(strict_types=1);

namespace App\DTO;

class Program
{
    private ?string $title;

    private ?string $schoolImageUrl;

    private ?\DateTimeImmutable $startsAt;

    private ?string $programCategory;

    private ?string $id;

    private ?string $description;

    public function __construct(
        ?string $title,
        ?string $schoolImageUrl,
        ?\DateTimeImmutable $startsAt,
        ?string $programCategory,
        ?string $id,
        ?string $description
    ) {
        $this->title = $title;
        $this->schoolImageUrl = $schoolImageUrl;
        $this->startsAt = $startsAt;
        $this->programCategory = $programCategory;
        $this->id = $id;
        $this->description = $description;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getSchoolImageUrl(): ?string
    {
        return $this->schoolImageUrl;
    }

    public function getStartsAt(): ?\DateTimeImmutable
    {
        return $this->startsAt;
    }

    public function getProgramCategory(): ?string
    {
        return $this->programCategory;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
