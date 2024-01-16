<?php

namespace App\Controller;

use Plugo\Controller\AbstractController;
use Plugo\Services\Auth\Authenticator;

class RoadtripController extends AbstractController
{
    public function add(): void
    {
        // récupérer tous les noms de la table vehicle

        $authenticator = new Authenticator();

        if (!$authenticator->isLoggedIn()) {
            $this->redirectToRoute('/');
        }

        



        $this->renderView('roadtrip/add.php');
    }
}