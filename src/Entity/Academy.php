<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Collection\ProgramCollection;
use App\Entity\Traits\TimestampableEntityTrait;
use App\Repository\AcademyRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=AcademyRepository::class)
 * @Gedmo\Loggable
 */
class Academy
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
     * @ORM\Column(name="academy_url", type="string", length=255, nullable=true)
     */
    private ?string $academyUrl = null;

    /**
     * @ORM\Column(name="academy_image_url", type="string", length=255, nullable=true)
     */
    private ?string $academyImageUrl = null;

    /**
     * @var Collection|Program[]
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\Program",
     *     mappedBy="academy",
     *     fetch="EAGER",
     *     cascade={"persist", "remove"},
     *     orphanRemoval=true
     * )
     */
    private Collection $programs;

    /**
     * @ORM\Column(name="slug", type="string", length=50, nullable=true)
     */
    private ?string $slug = null;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private ?string $description = null;

    public function __construct()
    {
        $this->programs = new ArrayCollection();
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

    public function getAcademyUrl(): ?string
    {
        return $this->academyUrl;
    }

    public function setAcademyUrl(?string $academyUrl): void
    {
        $this->academyUrl = $academyUrl;
    }

    public function getAcademyImageUrl(): ?string
    {
        return $this->academyImageUrl;
    }

    public function setAcademyImageUrl(?string $academyImageUrl): void
    {
        $this->academyImageUrl = $academyImageUrl;
    }

    public function getPrograms(): Collection
    {
        return $this->programs;
    }

    public function getProgramsAsCollection(): ProgramCollection
    {
        return new ProgramCollection($this->getPrograms()->toArray());
    }

    public function addProgram(Program $program): void
    {
        if (!$this->programs->contains($program)) {
            $this->programs->add($program);
            $program->setAcademy($this);
        }
    }

    public function setPrograms(Collection $programs): void
    {
        $this->programs = $programs;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
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
