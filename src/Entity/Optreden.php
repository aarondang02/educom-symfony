<?php

namespace App\Entity;

use App\Repository\OptredenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OptredenRepository::class)]
class Optreden
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'optredens')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Poppodium $poppodium = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoppodium(): ?Poppodium
    {
        return $this->poppodium;
    }

    public function setPoppodium(?Poppodium $poppodium): static
    {
        $this->poppodium = $poppodium;

        return $this;
    }
}
