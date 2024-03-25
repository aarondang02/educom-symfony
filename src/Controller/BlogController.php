<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Psr\Log\LoggerInterface;


#[Route('/blog')]
class BlogController extends BaseController
{
    #[Route('/', name: 'blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
    
    #[Route('/{page}', name: 'blog_list', requirements: ['page' => '/d+'])]
    public function list($page)
    {
        
    }


    #[Route('/show/{id}', name: 'blog_show')]
    public function show($id = 1){
        $this->log("info Message from extended BaseController");
        dd($id);
    }


}
