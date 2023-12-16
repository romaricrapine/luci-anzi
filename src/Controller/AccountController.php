<?php

namespace App\Controller;

use App\Repository\AccountRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    #[Route('/account', name: 'app_show_account')]
    public function showAccount(AccountRepository $accountRepository): Response
    {

        $user = $this->getUser();
        $numberOfLinkedAccounts = count($user->getAccounts());

        return $this->render('account/show_account.html.twig', [
            'numberOfLinkedAccounts' => $numberOfLinkedAccounts,
        ]);
    }

    #[Route('/account/add', name: 'app_add_account')]
    public function addAccount(): Response
    {

        $user = $this->getUser();
        $numberOfLinkedAccounts = count($user->getAccounts());

        return $this->render('account/add_account.html.twig', [
            'numberOfLinkedAccounts' => $numberOfLinkedAccounts,
        ]);
    }
}
