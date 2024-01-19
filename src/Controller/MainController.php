<?php

namespace App\Controller;

use Plugo\Controller\AbstractController;
use App\Manager\RoadtripManager;
use Plugo\Services\Flash\Flash;

class MainController extends AbstractController
{
    public function home(): void
    {
        $flash = new Flash();

        $RoadtripManager = new RoadtripManager();
        // 3 roadtrips by date of creation (DESC)
        $roadtrips = $RoadtripManager->findBy([], ['id' => 'DESC'], 3);

        $this->renderView('main/home.php', [
            'seo' => [
                'title' => 'Accueil',
                'description' => 'Accueil de Waw.travel',
            ],
            'roadtrips' => $roadtrips,
            'flash' => $flash
        ]);
    }
}
