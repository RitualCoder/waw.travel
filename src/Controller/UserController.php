<?php

namespace App\Controller;

use App\Manager\UserManager;
use App\Entity\User;
use Plugo\Services\Auth\Authenticator;
use Plugo\Controller\AbstractController;

class UserController extends AbstractController
{

    public function register(): void
    {

        $userManager = new UserManager();
        $user = new User();
        $authenticator = new Authenticator();

        if ($authenticator->isLoggedIn()) {
            $this->redirectToRoute('/');
        }

        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
            $user->setUsername($_POST['username']);
            $user->setPassword($_POST['password']);
            $user->setEmail($_POST['email']);

            $userManager->add($user);
            $authenticator->login($user->getUsername(), $user->getPassword(), $user->getEmail());
            $this->redirectToRoute('/');
        }

        $this->renderView('auth/register.php', ['user' => $user]);
    }

    public function login(): void
    {
        $userManager = new UserManager();
        $authenticator = new Authenticator();

        if ($authenticator->isLoggedIn()) {
            $this->redirectToRoute('/');
        }

        if (isset($_POST['email']) && isset($_POST['password'])) {
            $user = $userManager->findOneBy([
                'email' => $_POST['email'],
            ]);

            if (password_verify($_POST['password'], $user->getPassword())) {
                $authenticator->login($user->getUsername(), $user->getPassword(), $user->getEmail(), $user->getCreated_at());
                $this->redirectToRoute('/');
            }
        }

        $this->renderView('auth/login.php');
    }

    public function logout(): void
    {
        $authenticator = new Authenticator();
        $authenticator->logout();
        $this->redirectToRoute('connexion');
    }
}
