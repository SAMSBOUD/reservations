<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RepresentationRepository;



#[Route('/representation')]
class RepresentationController extends AbstractController
{
    #[Route('/', name:'representation_index', methods: ['GET'])]
    public function index(RepresentationRepository $repository): Response
    {
        $representations = $repository->findAll();

        return $this->render('representation/index.html.twig', [
            'representations' => $representations,
            'resource' => 'representations',

        ]);
    }


    #[Route('/{id}', name:'representation_show', methods: ['GET'])]
    public function show(int $id, RepresentationRepository $repository): Response
    {
        //var_dump($id);
        $representations = $repository->find(intval($id));

        return $this->render('representation/show.html.twig', [
            'representation' => $representations,
        ]);
    } 
}
