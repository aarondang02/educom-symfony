<?php

namespace App\Entity;

use App\Repository\PoppodiumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PoppodiumRepository::class)]
class Poppodium
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $naam = null;

    #[ORM\Column(length: 50)]
    private ?string $adres = null;

    #[ORM\Column(length: 50)]
    private ?string $postcode = null;

    #[ORM\Column(length: 50)]
    private ?string $woonplaats = null;

    #[ORM\Column(length: 50)]
    private ?string $telefoonnummer = null;

    #[ORM\Column(length: 50)]
    private ?string $email = null;

    #[ORM\Column(length: 100)]
    private ?string $website = null;

    #[ORM\Column(length: 100)]
    private ?string $logo_url = null;

    #[ORM\Column(length: 100)]
    private ?string $afbeelding_url = null;

    #[ORM\OneToMany(targetEntity: Optreden::class, mappedBy: 'poppodium')]
    private Collection $optredens;

    public function __construct()
    {
        $this->optredens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): static
    {
        $this->naam = $naam;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(?string $adres): static
    {
        $this->adres = $adres;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): static
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getWoonplaats(): ?string
    {
        return $this->woonplaats;
    }

    public function setWoonplaats(string $woonplaats): static
    {
        $this->woonplaats = $woonplaats;

        return $this;
    }

    public function getTelefoonnummer(): ?string
    {
        return $this->telefoonnummer;
    }

    public function setTelefoonnummer(string $telefoonnummer): static
    {
        $this->telefoonnummer = $telefoonnummer;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): static
    {
        $this->website = $website;

        return $this;
    }

    public function getLogoUrl(): ?string
    {
        return $this->logo_url;
    }

    public function setLogoUrl(string $logo_url): static
    {
        $this->logo_url = $logo_url;

        return $this;
    }

    public function getAfbeeldingUrl(): ?string
    {
        return $this->afbeelding_url;
    }

    public function setAfbeeldingUrl(string $afbeelding_url): static
    {
        $this->afbeelding_url = $afbeelding_url;

        return $this;
    }

    /**
     * @return Collection<int, Optreden>
     */
    public function getOptredens(): Collection
    {
        return $this->optredens;
    }

    public function addOptreden(Optreden $optreden): static
    {
        if (!$this->optredens->contains($optreden)) {
            $this->optredens->add($optreden);
            $optreden->setPoppodium($this);
        }

        return $this;
    }

    public function removeOptreden(Optreden $optreden): static
    {
        if ($this->optredens->removeElement($optreden)) {
            // set the owning side to null (unless already changed)
            if ($optreden->getPoppodium() === $this) {
                $optreden->setPoppodium(null);
            }
        }

        return $this;
    }
}
