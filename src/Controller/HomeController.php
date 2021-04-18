<?php

namespace App\Controller;

use App\Entity\Missions;
use App\Repository\MissionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MissionsRepositry; 

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index()
    {
        $missions = $this->getDoctrine()
                         ->getRepository(Missions::class)
                         ->findAll();

        return $this->render('home/index.html.twig', [
            'missions' => $missions,
        ]);
    }
}
