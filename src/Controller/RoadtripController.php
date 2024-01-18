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
use Plugo\Services\Flash\Flash;

class RoadtripController extends AbstractController
{
    public function list(): void
    {
        $authenticator = new Authenticator();
        $flash = new Flash();

        if (!$authenticator->isLoggedIn()) {
            $this->redirectToRoute('/connexion', ['flash' => $flash->flash('connexion', 'Vous devez être connecté pour accéder à cette page', "error")]);
        }

        $RoadtripManager = new RoadtripManager();
        $roadtrips = $RoadtripManager->findBy(['user_id' => $_SESSION['id']], ['id' => 'DESC']);

        $this->renderView('roadtrip/list.php', [
            'roadtrips' => $roadtrips,
        ]);
    }
    public function show($id): void
    {
        $RoadtripManager = new RoadtripManager();
        $roadtrip = $RoadtripManager->find($id);

        $this->renderView('roadtrip/show.php', [
            'roadtrip' => $roadtrip,
        ]);
    }
    public function add(): void
    {

        $authenticator = new Authenticator();

        $flash = new Flash();

        if (!$authenticator->isLoggedIn()) {
            $flash->flash('connexion', 'Vous devez être connecté pour accéder à cette page', "error");
            $this->redirectToRoute('/connexion', ['flash' => $flash]);
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

            $ImageManager = new ImageManager();
            $image = new Image();
            $filePath = null;

            // Ajout de l'image
            if (isset($_FILES['file'])) {
                $uploadImage = new ServiceImage();

                try {
                    $uploadDir = dirname(__DIR__, 2) . "/public/uploads/images/";
                    $filePath = $uploadImage->upload($_FILES["file"], $uploadDir);
                    // Ajout du chemin de l'image à l'objet Image
                    $image->setFilepath($filePath);
                    // Ajouter l'image à la base de données
                    $ImageManager->add($image);
                } catch (\Throwable $th) {
                    $th->getMessage();
                }
            }
            // récupérer l'id de l'image
            $imageUpload = $ImageManager->findBy(['filepath' => $filePath], ['id' => 'DESC'], 1);
            if (isset($filePath)) {
                $roadtrip->setImage($imageUpload[0]->getId());
            }

            $roadtrip->setUser($_SESSION['id']);

            $RoadtripManager->add($roadtrip);

            // récupérer l'id du roadtrip
            $roadtripId = $RoadtripManager->findBy(['user_id' => $_SESSION['id']], ['id' => 'DESC'], 1);

            // Ajout des étapes
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

            $this->redirectToRoute('/roadtrips');
        }
        -$this->renderView('roadtrip/add.php', [
            'vehicles' => $vehicles,
        ]);
    }
    public function edit($id): void
    {
        $authenticator = new Authenticator();
        $flash = new Flash();

        if (!$authenticator->isLoggedIn()) {
            $flash->flash('connexion', 'Vous devez être connecté pour accéder à cette page', "error");
            $this->redirectToRoute('/connexion', ['flash' => $flash]);
        }

        $RoadtripManager = new RoadtripManager();
        $roadtrip = $RoadtripManager->find($id);

        $VehicleManager = new VehicleManager();
        $vehicles = $VehicleManager->findAll();

        $ImageManager = new ImageManager();
        $image = $ImageManager->find($roadtrip->getImage_id());


        $StepManager = new StepManager();

        // edition roadtrip
        if (isset($_POST['edit-roadtrip'])) {

            $roadtrip->setName($_POST['name']);
            $roadtrip->setVehicle($_POST['vehicle']);

            $ImageManager = new ImageManager();
            $image = new Image();
            $filePath = null;

            // Ajout de l'image
            if (isset($_FILES['file'])) {
                $uploadImage = new ServiceImage();

                try {
                    $uploadDir = dirname(__DIR__, 2) . "/public/uploads/images/";
                    $filePath = $uploadImage->upload($_FILES["file"], $uploadDir);
                    // Ajout du chemin de l'image à l'objet Image
                    $image->setFilepath($filePath);
                    // Ajouter l'image à la base de données
                    $ImageManager->add($image);
                } catch (\Throwable $th) {
                    $th->getMessage();
                }
            }
            // récupérer l'id de l'image
            $imageUpload = $ImageManager->findBy(['filepath' => $filePath], ['id' => 'DESC'], 1);
            if (isset($filePath)) {
                $roadtrip->setImage($imageUpload[0]->getId());
            }

            $RoadtripManager->edit($roadtrip);

            $flash->flash('edit-roadtrip', 'Le roadtrip a bien été modifié', "success");
        }

        // ajout étape
        if (isset($_POST['add-step'])) {
            $step = new Step();

            $step->setName($_POST['step-name']);
            $step->setNumber($_POST['step-number']);
            $step->setCoordinates($_POST['step-coordonates']);
            $step->setDate_departure($_POST['step-departure-date']);
            $step->setDate_arrival($_POST['step-arrival-date']);
            $step->setRoadtrip_id($id);

            $StepManager->add($step);

            $flash->flash('add-step', 'L\'étape a bien été ajoutée', "success");

            $this->redirectToRoute('/roadtrip/' . $id . '/editer');
        }

        // suppression étape
        if (isset($_POST['delete-step'])) {
            $stepDelete = $StepManager->find($_POST['step-id']);


            $StepManager->delete($stepDelete);

            $flash->flash('delete-step', 'L\'étape a bien été supprimée', "success");

            $this->redirectToRoute('/roadtrip/' . $id . '/editer');
        }

        // suppression roadtrip
        if (isset($_POST['delete-roadtrip'])) {
            $roadtripDelete = $RoadtripManager->find($id);

            $RoadtripManager->delete($roadtripDelete);

            $flash->flash('delete-roadtrip', 'Le roadtrip a bien été supprimé', "success");

            $this->redirectToRoute('/roadtrips');
        }

        $this->renderView('roadtrip/edit.php', [
            'roadtrip' => $roadtrip,
            'vehicles' => $vehicles,
            'flash' => $flash,
        ]);
    }
}
