<?php

declare(strict_types=1);

namespace App\DTO;

class AcademyFilterRequest
{
    private ?string $slug;

    private ?string $program;

    private ?string $city;

    private ?string $price;

    public function __construct(
        ?string $slug,
        ?string $program,
        ?string $city,
        ?string $price,
    ) {
        $this->slug = $slug;
        $this->program = $program;
        $this->city = $city;
        $this->price = $price;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function getProgram(): ?string
    {
        return $this->program;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }
}
