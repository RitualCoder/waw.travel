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
            try {
                $user->setUsername($_POST['username']);
                $user->setPassword($_POST['password']);
                $user->setEmail($_POST['email']);

                // Ajouter l'utilisateur et récupérer l'instruction PDOStatement
                $statement = $userManager->add($user);

                // Si l'ajout est réussi, procédez à la connexion de l'utilisateur
                if ($statement instanceof \PDOStatement) {
                    $authenticator->login($user->getUsername(), $user->getPassword(), $user->getEmail());
                    $this->redirectToRoute('/');
                } else {
                    /* $this->redirectToRoute('inscription'); */
                    var_dump("ERROR");
                }
            } catch (\Throwable $th) {
                // Gestion des erreurs
                switch ($th->getCode()) {
                    case '23000': // Code pour violation d'intégrité (duplication de clé)
                        var_dump("Duplicate entry. Please choose a different username or email.");
                        break;
                    case 'HY000': // Code pour violation d'intégrité (duplication de clé)
                        var_dump("An error occurred: " . $th->getMessage());

                        // Ajoutez d'autres cas au besoin

                    default:
                        var_dump("An error occurred: " . $th->getMessage());
                }
            }
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
