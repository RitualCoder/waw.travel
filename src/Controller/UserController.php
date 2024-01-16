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

                $userId = $userManager->findOneBy([
                    'email' => $_POST['email'],
                ]);

                // Si l'ajout est réussi, procédez à la connexion de l'utilisateur
                if ($statement instanceof \PDOStatement) {
                    $authenticator->login($userId->getId());
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

        $this->renderView('auth/register.php', ['user' => $user, 'flash' => $flash]);
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
                $authenticator->login($user->getId());
                $flash->flash('login', 'Connexion réussie', "success");
                $this->redirectToRoute('/');
            } else {
                $flash->flash('login', 'Email ou mot de passe incorrect', "error");
            }
        }

        $this->renderView('auth/login.php', ['flash' => $flash]);
    }

    public function logout(): void
    {
        $authenticator = new Authenticator();
        $authenticator->logout();
        $this->redirectToRoute('connexion');
    }

    public function profil(): void
    {
        $authenticator = new Authenticator();
        $flash = new Flash();

        if (!$authenticator->isLoggedIn()) {
            $this->redirectToRoute('connexion');
        }

        $userManager = new UserManager();
        $user = $userManager->findOneBy([
            'id' => $_SESSION['id'],
        ]);

        $userManager = new UserManager();

        if (isset($_POST['username'])) {

            $user->setUsername($_POST['username']);

            $statement = $userManager->editUsername($user);

            if ($statement instanceof \PDOStatement) {
                $flash->flash('pseudo', 'Pseudo mis à jour', "success");
                $this->redirectToRoute('profil');
            } else {
                $flash->flash('profil', 'Une erreur est survenue', "error");
            }
        }

        if (isset($_POST['email'])) {
            $user->setEmail($_POST['email']);

            $statement = $userManager->editEmail($user);

            if ($statement instanceof \PDOStatement) {
                $flash->flash('email', 'Email mis à jour !', "success");
                $this->redirectToRoute('profil');
            } else {
                $flash->flash('profil', 'Une erreur est survenue', "error");
            }
        }

        if (isset($_POST['password'])) {
            $user->setPassword($_POST['password']);

            $statement = $userManager->editPassword($user);

            if ($statement instanceof \PDOStatement) {
                $flash->flash('password', 'Mot de passe mis à jour !', "success");
                $this->redirectToRoute('profil');
            } else {
                $flash->flash('profil', 'Une erreur est survenue', "error");
            }
        }

        $created_at = $user->getCreated_at();
        $created_at = date('d/m/Y', strtotime($created_at));

        $this->renderView(
            'main/profil.php',
            [
                'seo' => [
                    'title' => 'Mon profil',
                ],
                'user' => [
                    'username' => $user->getUsername(),
                    'email' => $user->getEmail(),
                    'created_at' => $created_at,
                ],
                'flash' => $flash,
            ],
        );
    }
}
