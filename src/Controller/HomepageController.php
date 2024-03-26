<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Optreden;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/homepage')]
class HomepageController extends AbstractController
{


    #[Route('/', name: 'homepage')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        
        $repo = $entityManager->getRepository(Optreden::class);
        $data = $repo->getAllOptredens();

        dump($data);
        //die();
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }

    #[Route('/save-data', name: 'homepage_save_data')]
    public function saveData(Request $request){
        $params = $request->request->all();
        dd($params);
    }

    #[Route('/data.{_format}', name: 'api_output', requirements: ['_format'=>'xml|json'])]
    public function api($_format){
        $data = [
            ["id" => 1, "naam" => "Piet"],
            ["id" => 2, "naam" => "Wilma"],
            ["id" => 3, "naam" => "Harrie"]
        ];

        if($_format == "json"){
            return($this->json($data));
        } else {
            $d = "<data>";
            foreach($data as $record) {
                    $id = $record["id"];
                    $naam = $record["naam"];
                    $d .= "<record id='$id'>$naam</record>";
            }   
            $d .= "</data>";
            return(new Response($d));
        }
    }

}
