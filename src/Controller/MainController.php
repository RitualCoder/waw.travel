<?php

namespace App\Controller;

use Plugo\Controller\AbstractController;
use App\Manager\ImageManager;
use Plugo\Services\Upload\ServiceImage;
use App\Entity\Image;

class MainController extends AbstractController
{
    public function home(): void
    {

        if (isset($_FILES['file'])) {
            $imageManager = new ImageManager();
            $image = new Image();
            $uploadImage = new ServiceImage();

            try {
                $uploadDir = dirname(__DIR__, 2) . "/public/uploads/images/";
                $filePath = $uploadImage->upload($_FILES["file"], $uploadDir);

                // Ajout du chemin de l'image à l'objet Image
                $image->setFilepath($filePath);

                // Ajouter l'image à la base de données
                $imageManager->add($image);
            } catch (\Throwable $th) {
                $th->getMessage();
            }

            $this->redirectToRoute('/');
        }
        $this->renderView('main/home.php');
    }
}
