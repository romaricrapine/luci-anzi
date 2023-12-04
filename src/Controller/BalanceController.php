<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BalanceController extends AbstractController
{
    #[Route('/balance', name: 'app_balance')]
    public function balance(): Response
    {
        return $this->render('balance/balance.html.twig');
    }
}
