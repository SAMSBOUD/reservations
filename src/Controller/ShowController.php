<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Show;
use App\Repository\ShowRepository;


#[Route('/show')]
class ShowController extends AbstractController
{
    #[Route('/', name:'show_index', methods: ['GET'])]
    public function index(ShowRepository $repository): Response
    {
        $shows = $repository->findAll();

        return $this->render('show/index.html.twig', [

            'shows' => $shows,
            'resource' => 'shows',
        ]);
    }



    #[Route("/show/{id}", name:"show_show")]
    public function show(int $id,ShowRepository $repository): Response
    {
        //$repository = $this->getDoctrine()->getRepository(Locality::class);
        $show = $repository->find(intval($id));

        return $this->render('show/show.html.twig', [
            'show' => $show,
        ]);
    }

}
