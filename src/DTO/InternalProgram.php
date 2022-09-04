<?php

declare(strict_types=1);

namespace App\DTO;

use App\Entity\Academy;

class InternalProgram
{
    private Academy $academy;

    private string $title;

    private string $programCategory;

    private string $price;

    private string $city;

    private string $description;

    public function __construct(
        Academy $academy,
        string $title,
        string $programCategory,
        string $price,
        string $city,
        string $description
    ) {
        $this->academy = $academy;
        $this->title = $title;
        $this->programCategory = $programCategory;
        $this->price = $price;
        $this->city = $city;
        $this->description = $description;
    }

    public function getAcademy(): Academy
    {
        return $this->academy;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function getProgramCategory(): ?string
    {
        return $this->programCategory;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
