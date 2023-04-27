<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Locality;
use App\Repository\LocalityRepository;

#[Route('/locality')]
class LocalityController extends AbstractController
{
    #[Route('/', name:'locality_index', methods: ['GET'])]
    public function index(LocalityRepository $repository): Response
    {
        $localities = $repository->findAll();
        //var_dump($artists);

        return $this->render('locality/index.html.twig', [
            'localities' => $localities,
            'resource' => 'Localites',
        ]);

    } 


    
    #[Route("/locality/{id}", name:"locality_show")]
    public function show(int $id,LocalityRepository $repository): Response
    {
        //$repository = $this->getDoctrine()->getRepository(Locality::class);
        $locality = $repository->find(intval($id));

        return $this->render('locality/show.html.twig', [
            'locality' => $locality,
        ]);
    }

}




