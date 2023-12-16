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

        $user = $this->getUser();
        $numberOfLinkedAccounts = count($user->getAccounts());

        return $this->render('home/dasboard.html.twig', [
            'numberOfLinkedAccounts' => $numberOfLinkedAccounts,
        ]);
    }


    #[Route('/logout', name: 'app_logout')]
    public function logout(): Response
    {
        throw new \Exception();
    }
}
