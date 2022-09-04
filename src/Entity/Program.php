<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Traits\TimestampableEntityTrait;
use App\Repository\ProgramRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=ProgramRepository::class)
 * @Gedmo\Loggable
 */
class Program
{
    use TimestampableEntityTrait;

    /**
     * @ORM\Id
     * @ORM\Column(type="guid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=\App\Utils\UuidGenerator::class)
     */
    private string $id;

    /**
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private ?string $title = null;

    /**
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private ?string $city = null;

    /**
     * @ORM\Column(name="price", type="string", length=255, nullable=true)
     */
    private ?string $price = null;

    /**
     * @ORM\Column(name="school_image_url", type="string", length=255, nullable=true)
     */
    private ?string $schoolImageUrl = null;

    /**
     * @ORM\Column(name="starts_at", type="datetime_immutable", nullable=true)
     */
    private ?\DateTimeImmutable $startsAt = null;

    /**
     * @ORM\Column(name="program_category", type="string", length=255, nullable=true)
     */
    private ?string $programCategory = null;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Academy", inversedBy="programs")
     * @ORM\JoinColumn(name="academy_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private Academy $academy;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private ?string $description = null;

    public function __construct(Academy $academy)
    {
        $this->academy = $academy;
    }

    public function getAcademy(): Academy
    {
        return $this->academy;
    }

    public function setAcademy(Academy $academy): void
    {
        $this->academy = $academy;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): void
    {
        $this->price = $price;
    }

    public function getSchoolImageUrl(): ?string
    {
        return $this->schoolImageUrl;
    }

    public function setSchoolImageUrl(?string $schoolImageUrl): void
    {
        $this->schoolImageUrl = $schoolImageUrl;
    }

    public function getStartsAt(): ?\DateTimeImmutable
    {
        return $this->startsAt;
    }

    public function setStartsAt(?\DateTimeImmutable $startsAt): void
    {
        $this->startsAt = $startsAt;
    }

    public function getProgramCategory(): ?string
    {
        return $this->programCategory;
    }

    public function setProgramCategory(?string $programCategory): void
    {
        $this->programCategory = $programCategory;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
}
