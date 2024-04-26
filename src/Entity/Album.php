<?php

namespace App\Entity;

use App\Entity\Album;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AlbumRepository;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: AlbumRepository::class)]
class Album
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read'])]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['read','create','update'])]
    #[Assert\NotBlank(groups: ['create'])]
    private ?string $name = null;

    #[ORM\Column]
    #[Groups(['read','create','update'])]
    private ?int $year = null;

    #[ORM\Column]
    #[Groups(['read','create','update'])]
    private ?int $artist_id = null;

    /**
     * @var Collection<int, Artist>
     */
    #[ORM\ManyToMany(targetEntity: Artist::class)]
    #[Groups(['read','create','update'])]
    private Collection $artists;

    public function __construct()
    {
        $this->tracks = new ArrayCollection();
        $this->artists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getArtist_id(): ?int
    {
        return $this->artist_id;
    }

    public function setArtist_id(int $artist_id): static
    {
        $this->artist_id = $artist_id;

        return $this;
    }

    /**
     * @return Collection<int, Artist>
     */
    public function getArtists(): Collection
    {
        return $this->artists;
    }

    public function addArtist(Artist $artist): static
    {
        if (!$this->artists->contains($artist)) {
            $this->artists->add($artist);
        }

        return $this;
    }

    public function removeArtist(Artist $artist): static
    {
        $this->artists->removeElement($artist);

        return $this;
    }
}
