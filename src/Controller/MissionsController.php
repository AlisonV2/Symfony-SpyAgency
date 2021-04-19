<?php

namespace App\Controller;

use App\Entity\Missions;
use App\Form\MissionsType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MissionsController extends AbstractController
{
    #[Route('/missions', name: 'missions')]
    public function index(Request $request): Response
    {
        {
            $missions = new Missions;
    
            $form = $this->createForm(MissionsType::class, $missions);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
    
                $missions = $form->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($missions);
                $entityManager->flush(); 
    
                return $this->redirectToRoute('missions');
            }
    
            return $this->render('missions/index.html.twig', [
                'form' => $form->createView(),
            ]);
        }
    }
}
