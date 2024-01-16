<?php

namespace App\Controller;

use App\Manager\UserManager;
use App\Entity\User;
use Plugo\Services\Auth\Authenticator;
use Plugo\Controller\AbstractController;
use Plugo\Services\Flash\Flash;

class UserController extends AbstractController
{

    public function register(): void
    {
        $userManager = new UserManager();
        $user = new User();
        $authenticator = new Authenticator();
        $flash = new Flash();

        if ($authenticator->isLoggedIn()) {
            $this->redirectToRoute('/');
        }

        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
            try {
                $user->setUsername($_POST['username']);
                $user->setPassword($_POST['password']);
                $user->setEmail($_POST['email']);

                // Ajouter l'utilisateur et récupérer l'instruction PDOStatement
                $statement = $userManager->add($user);

                // Si l'ajout est réussi, procédez à la connexion de l'utilisateur
                if ($statement instanceof \PDOStatement) {
                    $authenticator->login($user->getUsername(), $user->getPassword(), $user->getEmail());
                    $flash->flash('register', 'Inscription réussie. Vous êtes maintenant connecté.', "error");
                    $this->redirectToRoute('/');
                }
            } catch (\Throwable $th) {
                // Gestion des erreurs
                switch ($th->getCode()) {
                    case 'HY000':
                    case '23000': // Code pour violation d'intégrité (duplication de clé)
                        $flash->flash('register', 'Un compte est déjà existant avec cet email', "error");
                    break;
                    default:
                        $flash->flash('register', 'Une erreur est survenue', "error");
                }
            }
        }

        $this->renderView('auth/register.php', ['user' => $user]);
    }
    public function login(): void
    {
        $flash = new Flash();
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
                $flash->flash('login', 'Connexion réussie', "success");
                $this->redirectToRoute('/');
            } else {
                $flash->flash('login', 'Email ou mot de passe incorrect', "error");
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
