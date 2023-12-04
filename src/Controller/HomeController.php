<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route('/dashboard', name: 'app_dashboard')]
    public function dashboard(): Response
    {
        return $this->render('home/dasboard.html.twig');
    }

    #[Route('/account', name: 'app_show_account')]
    public function showAccount(): Response
    {
        return $this->render('home/show_account.html.twig');
    }

    #[Route('/account/add', name: 'app_add_account')]
    public function addAccount(): Response
    {
        return $this->render('home/add_account.html.twig');
    }

    #[Route('/order', name: 'app_show_order')]
    public function showOrder(): Response
    {
        return $this->render('home/show_order.html.twig');
    }

    #[Route('/balance', name: 'app_balance')]
    public function balance(): Response
    {
        return $this->render('home/balance.html.twig');
    }

    #[Route('/logout', name: 'app_logout')]
    public function logout(): Response
    {
        throw new \Exception();
    }
}
