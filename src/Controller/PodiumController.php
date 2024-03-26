<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Poppodium;

class PodiumController extends AbstractController
{
    #[Route('/podium', name: 'podium')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $poppodium = [
            "naam" => "De Melkweg",
            "adres" => "Lijnbaansgracht 234a",
            "postcode" => "1017PH",
            "woonplaats" => "Amsterdam",
            "telefoonnummer" => "020-5318181",
            "email" => "info@melkweg.nl",
            "website" => "https://melkweg.nl",
           ];
        
        $repo = $entityManager->getRepository(Poppodium::class);
        $result = $repo->createPoppodiums($poppodium, $entityManager);
        dd($result);
    }

}
