<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Security\DiscordAuthenticator;
use App\Service\DiscordApiService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiscordController extends AbstractController
{

    public function __construct(
        private readonly DiscordApiService $discordApiService
    )
    {

    }

    #[Route('/discord/connect', name: 'app_discord_connect')]
    public function connect(Request $request): Response
    {

        $token = $request->request->get('token');

        if ($this->isCsrfTokenValid('discord-auth', $token)) {
            $request->getSession()->set(DiscordAuthenticator::DISCORD_AUTH_KEY, true);
            $scope = ['identify', 'email'];
            return $this->redirect($this->discordApiService->getAuthorizationUrl($scope));
        }

        return $this->redirectToRoute('app_home');

    }

    #[Route('/discord/auth', name: 'app_discord_auth')]
    public function auth(): Response
    {
        return $this->redirectToRoute('app_dashboard');
    }


    #[Route('/discord/check', name: 'app_discord_check')]
    public function check(Request $request, EntityManagerInterface $entityManager, UserRepository $userRepository)
    {
        $accessToken = $request->get('access_token');

        if (!$accessToken) {
            return $this->render('discord/check.html.twig');
        }

        $discordUser = $this->discordApiService->fetchUser($accessToken);

        $user = $userRepository->findOneBy(['discordId' => $discordUser->id]);

        if ($user) {

            $user->setAccessToken($accessToken);
            $user->setDiscordId($discordUser->id);
            $user->setUsername($discordUser->username);
            $user->setEmail($discordUser->email);
            $user->setAvatar($discordUser->avatar);

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_discord_auth', [
                'accessToken' => $accessToken
            ]);
        }

        return $this->redirectToRoute('app_home');

    }

}
