<?php

namespace App\Controller;

use App\Entity\Missions;
use App\Repository\MissionsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home_index', methods: ['GET'])]
    public function index(MissionsRepository $missionsRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'missions' => $missionsRepository->findAll(),
        ]);
    }

    #[Route('/home/{id}', name: 'home_show', methods: ['GET'])]
    public function show(Missions $mission): Response
    {
        return $this->render('home/show.html.twig', [
            'mission' => $mission,
        ]);
    }
}
