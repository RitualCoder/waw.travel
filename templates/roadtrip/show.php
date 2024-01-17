<?php
$image = $data['roadtrip']->getImage();
$imageFilepath = $image->getFilepath();
$vehicle = $data['roadtrip']->getVehicle();
$vehicleName = $vehicle->getName();
$vehicleIcon = $vehicle->getIcon();
$user = $data['roadtrip']->getUser();
$username = $user->getUsername();


?>
<div class="container">
    <section>
        <div>
            <h1><?= $data['roadtrip']->getName() ?></h1>
            <div>
                <span>
                    <img src=<?='/images/icons/' . $vehicleIcon . '.svg' ?> alt="<?= $vehicleName . ' icon' ?>">
                    <p><?= $vehicleName ?></p>
                </span>
                <span>
                    <img src="" alt="compass icon">
                    <p>1 256 km</p>
                </span>
            </div>
            <span>
                <img src="" alt="location icon">
                <p>De : <?= $data['roadtrip']->getSteps()[0]->getName() ?></p>
            </span>
            <span>
                <img src="" alt="location icon">
                <p>À : <?= $data['roadtrip']->getSteps()[$data['roadtrip']->getStepsNumber() - 1]->getName() ?></p>
            </span>
            <span>
                <img src="" alt="étapes icon">
                <p><?= $data['roadtrip']->getStepsNumber() ?> étapes</p>
            </span>
            <p>Par <span><?= $username ?></span></p>
        </div>
        <img src=<?= $image->getFilepath() ?> alt=<?= $data['roadtrip']->getName() ?>>
    </section>
</div>