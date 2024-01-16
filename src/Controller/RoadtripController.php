<?php

namespace App\Controller;

use App\Manager\VehicleManager;
use Plugo\Controller\AbstractController;
use Plugo\Services\Auth\Authenticator;
use App\Manager\RoadtripManager;
use App\Entity\Roadtrip;
use App\Entity\Step;
use App\Manager\ImageManager;
use Plugo\Services\Upload\ServiceImage;
use App\Entity\Image;
use App\Manager\StepManager;

class RoadtripController extends AbstractController
{
    public function add(): void
    {

        $authenticator = new Authenticator();

        if (!$authenticator->isLoggedIn()) {
            $this->redirectToRoute('/');
        }

        $VehicleManager = new VehicleManager();
        $vehicles = $VehicleManager->findAll();

        $RoadtripManager = new RoadtripManager();
        $roadtrip = new Roadtrip();

        $StepManager = new StepManager();
        $step1 = new Step();
        $step2 = new Step();

        if (isset($_POST['add-roadtrip'])) {
            $roadtrip->setName($_POST['name']);
            $roadtrip->setVehicle($_POST['vehicle']);

            if (isset($_FILES['image'])) {
                $imageManager = new ImageManager();
                $image = new Image();
                $uploadImage = new ServiceImage();
    
                try {
                    $uploadDir = dirname(__DIR__, 2) . "/public/uploads/images/";
                    $filePath = $uploadImage->upload($_FILES["image"], $uploadDir);
    
                    // Ajout du chemin de l'image à l'objet Image
                    $image->setFilePath($filePath);
    
                    // Ajouter l'image à la base de données
                    $imageManager->add($image);
                } catch (\Throwable $th) {
                    $th->getMessage();
                }
                $roadtrip->setImage($image->getId());
            }

            $roadtrip->setUser($_SESSION['id']);

            $RoadtripManager->add($roadtrip);

            $roadtripId = $RoadtripManager->findBy(['user_id' => $_SESSION['id']], ['id' => 'DESC'], 1 );

            $step1->setName($_POST['first-step-name']);
            $step1->setNumber($_POST['first-step-number']);
            $step1->setCoordinates($_POST['first-step-coordonates']);
            $step1->setDate_departure($_POST['first-step-departure-date']);
            $step1->setDate_arrival($_POST['first-step-arrival-date']);
            $step1->setRoadtrip_id($roadtripId[0]->getId());

            $StepManager->add($step1);

            $step2->setName($_POST['last-step-name']);
            $step2->setNumber($_POST['last-step-number']);
            $step2->setCoordinates($_POST['last-step-coordonates']);
            $step2->setDate_departure($_POST['last-step-departure-date']);
            $step2->setDate_arrival($_POST['last-step-arrival-date']);
            $step2->setRoadtrip_id($roadtripId[0]->getId());

            $StepManager->add($step2);

            $this->redirectToRoute('/');
        }-

        $this->renderView('roadtrip/add.php', [
            'vehicles' => $vehicles,
        ]);
    }
}
