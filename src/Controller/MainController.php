<?php

namespace App\Controller;

use Plugo\Controller\AbstractController;
use App\Manager\ImageManager;
use App\Entity\Image;

class MainController extends AbstractController
{
    public function home(): void
    {
        $imageManager = new ImageManager();
        $image = new Image();

        // var_dump($_POST['file']);
        // var_dump($_FILES['file']);

        if (isset($_FILES['file'])) {
            try {
                $id = uniqid();
                $filePath = "public/uploads/" . $id;

                var_dump($filePath);
                $image->setFilePath($filePath);

                if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
                    try {
                        $imageManager->add($image);
                    } catch (\Throwable $th) {
                        var_dump($th . 'error');
                    }
                } else {
                    // Gérer l'erreur liée au déplacement du fichier
                    echo 'Erreur lors du déplacement du fichier téléchargé.';
                }
            } catch (\Throwable $th) {
                var_dump($th . 'error');
            }

            $this->redirectToRoute('/');
        }
        $this->renderView('main/home.php');
    }
}
