<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

#[Route('/contactpage')]
class ContactpageController extends AbstractController
{
    #[Route('/', name: 'contactpage')]
    public function index(): Response
    {
        return $this->render('contactpage/index.html.twig', [
            'controller_name' => 'ContactpageController',
        ]);
    }
    #[Route(path: [
        'en' => '/contact-us',
        'nl' => '/neem-contact-op'
   ], name: 'contact')]
   public function contact(Request $request)
     {
         $locale = $request->getLocale();
         $msg = "This page is in English";
         if($locale == "nl") {
             $msg = "Deze pagina is in het Nederlands";
         }
         return new Response(
             "<html><body>$msg</body></html>"
         ); 
 }

}
