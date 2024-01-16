<?php

namespace App\Controller;

use Plugo\Controller\AbstractController;
use App\Manager\ImageManager;
use Plugo\Services\Upload\ServiceImage;
use App\Entity\Image;
use Plugo\Services\Flash\Flash;

class MainController extends AbstractController
{
    public function home(): void
    {
        $flash = new Flash();
        if (isset($_FILES['file'])) {
            $imageManager = new ImageManager();
            $image = new Image();
            $uploadImage = new ServiceImage();

            try {
                $uploadDir = dirname(__DIR__, 2) . "/public/uploads/images/";
                $filePath = $uploadImage->upload($_FILES["file"], $uploadDir);

                // Ajout du chemin de l'image à l'objet Image
                $image->setFilePath($filePath);

                // Ajouter l'image à la base de données
                $imageManager->add($image);
            } catch (\Throwable $th) {
                var_dump($th->getMessage());
            }
            $this->redirectToRoute('/');
        }
        $this->renderView('main/home.php', ['flash' => $flash]);
    }
}
