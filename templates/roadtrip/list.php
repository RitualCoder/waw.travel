<div class="container">
    <section>
        <h1>Mon carnet de voyage</h1>
        <a href="/roadtrip/ajouter">Ajouter un road trip</a>
    </section>

    <section>
        <?php foreach ($data['roadtrips'] as $roadtrip) : ?>
            <a>
                <img src="" alt="">
                <h2><?= $roadtrip->getName() ?></h2>
                <div>
                    <span>
                        <img src="" alt="icon">
                        <p><?= $roadtrip->getVehicle()->getName() ?></p>
                    </span>
                    <span>
                        <img src="" alt="icon">
                        <p><?= $roadtrip->getStepsNumber() ?></p>
                    </span>
                </div>
                <span>
                    <img src="" alt="icon">
                    <p>De : <?= $roadtrip->getSteps()[0]->getName() ?></p>
                </span>
                <span>
                    <img src="" alt="icon">
                    <p>À : <?= $roadtrip->getSteps()[$roadtrip->getStepsNumber() - 1]->getName() ?></p>
                </span>
            </a>
        <?php endforeach; ?>
    </section>
</div>