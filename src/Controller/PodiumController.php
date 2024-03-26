<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PodiumController extends AbstractController
{
    #[Route('/podium', name: 'app_podium')]
    public function index(): Response
    {
        return $this->render('podium/index.html.twig', [
            'controller_name' => 'PodiumController',
        ]);
    }
}
