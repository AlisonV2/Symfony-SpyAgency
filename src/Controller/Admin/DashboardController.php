<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Agents;
use App\Entity\Contacts;
use App\Entity\Missions;
use App\Entity\Safeplaces;
use App\Entity\Targets;
use App\Entity\User;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
            #$routeBuilder = $this->get(AdminUrlGenerator::class);
    
            #return $this->redirect($routeBuilder->setController(MissionsCrudController::class)->generateUrl());
            return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SpyAgency');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Missions', 'fas fa-list', Missions::class);
        yield MenuItem::linkToCrud('Agents', 'fas fa-list', Agents::class);
        yield MenuItem::linkToCrud('Contacts', 'fas fa-list', Contacts::class);
        yield MenuItem::linkToCrud('Safeplaces', 'fas fa-list', Safeplaces::class);
        yield MenuItem::linkToCrud('Targets', 'fas fa-list', Targets::class);
        yield MenuItem::linkToCrud('Targets', 'fas fa-list', User::class);
    }
}
