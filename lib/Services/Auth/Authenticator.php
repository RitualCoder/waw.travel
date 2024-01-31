<?php

namespace Plugo\Services\Auth;

use App\Manager\UserManager;

class Authenticator

{
    public function login(int $id): void
    {
        $_SESSION['id'] = $id;
    }

    public function logout(): void
    {
        unset($_SESSION['id']);
    }

    public function isLoggedIn(): bool
    {

        // Vérifer si l'utilisateur est connecté
        if (isset($_SESSION['id'])) {
            $userManager = new UserManager();
            $user = $userManager->find($_SESSION['id']);
            
            // Vérifier si l'utilisateur existe toujours en base de données (si il n'a pas été supprimé)
            if ($user) {
                return true;
            } else {
                unset($_SESSION['id']);
            }
        }
        return false;
    }
}
