<?php

namespace App\Controller;

use Plugo\Controller\AbstractController;

class HomeController extends AbstractController
{

    public function home(): void
    {
        $this->renderView('main/home.php');
    }
}