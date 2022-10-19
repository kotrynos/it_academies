<?php

declare(strict_types=1);

namespace App\DTO;

class ProgramFilterRequest
{
    private ?string $program;

    private ?string $city;

    private ?string $price;

    private ?string $slug;

    public function __construct(
        ?string $program,
        ?string $city,
        ?string $price,
        ?string $slug,
    ) {
        $this->program = $program;
        $this->city = $city;
        $this->price = $price;
        $this->slug = $slug;
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }
}
