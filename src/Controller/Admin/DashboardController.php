<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Repository\UserRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/dashboard/admin', name: 'app_admin')]
    public function index(): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Dashboard Utilisateur', 'fa fa-home', '/dashboard');

        yield MenuItem::section('Administration', 'fa-solid fa-hashtag');
        yield MenuItem::subMenu('Utilisateurs', 'fas fa-users')
            ->setSubItems([
                MenuItem::linkToCrud('Gestion', 'fa-solid fa-user-gear', User::class)
            ]);

        yield MenuItem::section('Logs', 'fa-regular fa-folder-open');
        yield MenuItem::linkToRoute('Logs Uber/Deliveroo', 'fa-solid fa-burger', 'app_dashboard');
        yield MenuItem::linkToRoute('Logs Abonnement', 'fa-solid fa-rotate', 'app_dashboard');
    }


}
