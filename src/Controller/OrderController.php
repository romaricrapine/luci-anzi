<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    #[Route('/order', name: 'app_show_order')]
    public function showOrder(): Response
    {
        return $this->render('order/show_order.html.twig');
    }

    #[Route('/order/ue', name: 'app_show_order_UE')]
    public function showOrderUE(): Response
    {
        if (!$this->isGranted('ROLE_UBER')) {
            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('order/show_order_UE.html.twig');
    }

    #[Route('/order/ue-{id}', name: 'app_show_one_order_UE')]
    public function showOneOrderUE(): Response
    {

        if (!$this->isGranted('ROLE_UBER')) {
            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('order/show_one_order_UE.html.twig');
    }

    #[Route('/order/dv', name: 'app_show_order_DV')]
    public function showOrderDV(): Response
    {
        if (!$this->isGranted('ROLE_DELIVEROO')) {
            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('order/show_order_DV.html.twig');
    }

    #[Route('/order/dv-{id}', name: 'app_show_one_order_DV')]
    public function showOneOrderDV(): Response
    {
        if (!$this->isGranted('ROLE_DELIVEROO')) {
            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('order/show_one_order_DV.html.twig');
    }
}
