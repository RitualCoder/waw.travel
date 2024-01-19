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
                    $this->redirectToRoute('/', ['flash' => $flash->flash('home', 'Inscription réussie. Vous êtes maintenant connecté.', "success")]);
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

        $this->renderView('auth/register.php', [
            'seo' => [
                'title' => 'Inscription',
                'description' => 'Inscription sur Waw.travel',
            ],
            'flash' => $flash
        ]);
    }
    public function login(): void
    {
        $flash = new Flash();
        $userManager = new UserManager();
        $authenticator = new Authenticator();

        if ($authenticator->isLoggedIn()) {
            $this->redirectToRoute('/');
        }

        if (isset($_POST['login'])) {
            $user = $userManager->findOneBy([
                'email' => $_POST['email'],
            ]);

            if (!$user) {
                $flash->flash('login', 'Email ou mot de passe incorrect', "error");
            } else {
                if (password_verify($_POST['password'], $user->getPassword())) {
                    $authenticator->login($user->getId());
                    $this->redirectToRoute('/');
                } else {
                    $flash->flash('login', 'Email ou mot de passe incorrect', "error");
                }
            }
        }

        $this->renderView('auth/login.php', [
            'seo' => [
                'title' => 'login',
                'description' => 'Connexion sur Waw.travel',
            ],
            'flash' => $flash
        ]);
    }

    public function logout(): void
    {
        $authenticator = new Authenticator();
        $flash = new Flash();
        $authenticator->logout();
        $this->redirectToRoute('/', ['flash' => $flash->flash('home', 'Vous êtes maintenant déconnecté', "success")]);
    }

    public function profil(): void
    {
        $authenticator = new Authenticator();
        $flash = new Flash();

        if (!$authenticator->isLoggedIn()) {
            $this->redirectToRoute('/connexion', ['flash' => $flash->flash('connexion', 'Vous devez être connecté pour accéder à cette page', "error")]);
        }

        $userManager = new UserManager();
        $user = $userManager->findOneBy([
            'id' => $_SESSION['id'],
        ]);

        $userManager = new UserManager();

        if (isset($_POST['edit-username'])) {

            $user->setUsername($_POST['username']);

            $statement = $userManager->editUsername($user);

            if ($statement instanceof \PDOStatement) {
                $flash->flash('profil', 'Pseudo mis à jour', "success");
                $this->redirectToRoute('profil');
            } else {
                $flash->flash('profil', 'Une erreur est survenue', "error");
            }
        }

        if (isset($_POST['edit-email'])) {
            $user->setEmail($_POST['email']);

            $statement = $userManager->editEmail($user);

            if ($statement instanceof \PDOStatement) {
                $flash->flash('profil', 'Email mis à jour !', "success");
                $this->redirectToRoute('profil');
            } else {
                $flash->flash('profil', 'Une erreur est survenue', "error");
            }
        }

        if (isset($_POST['edit-password'])) {
            $user->setPassword($_POST['password']);

            $statement = $userManager->editPassword($user);

            if ($statement instanceof \PDOStatement) {
                $flash->flash('profil', 'Mot de passe mis à jour !', "success");
                $this->redirectToRoute('profil');
            } else {
                $flash->flash('profil', 'Une erreur est survenue', "error");
            }
        }

        if (isset($_POST['delete-account'])) {

            if (!password_verify($_POST['deletePassword'], $user->getPassword())) {
                $this->redirectToRoute('/profil', ['flash' => $flash->flash('profil', 'Mot de passe incorrect', "error")]);
            }
            $statement = $userManager->delete($user);

            if ($statement instanceof \PDOStatement) {
                $authenticator->logout();
                $this->redirectToRoute('/', ['flash' => $flash->flash('home', 'Votre compte a bien été supprimé', "success")]);
            } else {
                $flash->flash('profil', 'Une erreur est survenue', "error");
            }
        }

        $this->renderView(
            'main/profil.php',
            [
                'seo' => [
                    'title' => 'Profil',
                    'description' => 'Profil de l\'utilisateur',
                ],
                'user' => $user,
                'flash' => $flash,
            ],
        );
    }
}
