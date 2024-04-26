<?php

namespace App\Entity;

use App\Entity\Album;
use App\Entity\Track;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TrackRepository;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: TrackRepository::class)]
class Track
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read'])]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['read','create','update'])]
    #[Assert\NotBlank(groups: ['create'])]
    private ?string $title = null;

    #[ORM\Column]
    #[Groups(['read','create','update'])]
    private ?int $duration = null;

    #[ORM\Column]
    #[Groups(['read','create','update'])]
    private ?int $album_id = null;

    /**
     * @var Collection<int, Album>
     */
    #[ORM\ManyToMany(targetEntity: Album::class)]
    #[Groups(['read','create','update'])]
    private Collection $albums;

    public function __construct()
    {
        $this->albums = new ArrayCollection();
        $this->artists = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getAlbum_id(): ?int
    {
        return $this->album_id;
    }

    public function setAlbum_id(int $album_id): static
    {
        $this->album_id = $album_id;

        return $this;
    }

    /**
     * @return Collection<int, Album>
     */
    public function getAlbums(): Collection
    {
        return $this->albums;
    }

    public function addAlbums(Album $album): static
    {
        if (!$this->albums->contains($album)) {
            $this->albums->add($album);
        }

        return $this;
    }

    public function removeAlbum(Album $album): static
    {
        $this->albums->removeElement($album);

        return $this;
    }

}
