<div class="container">

    <div>
        <p><?= $data['flash']->display_flash_message('add-step'); ?></p>
    </div>
    <h1>Éditer un road trip</h1>

    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="edit-roadtrip">

        <input type="text" name="name" id="name" value=<?= $data['roadtrip']->getName() ?> required>

        <h2>Type de véhicule</h2>

        <select name="vehicle" id="vehicle" required>
            <?php foreach ($data['vehicles'] as $vehicle) :
                if ($vehicle->getId() == $data['roadtrip']->getVehicle_id()) { ?>
                    <option value="<?= $vehicle->getId() ?>" selected><?= $vehicle->getName() ?></option>
                <?php } else { ?>
                    <option value="<?= $vehicle->getId() ?>"><?= $vehicle->getName() ?></option>
            <?php }
            endforeach; ?>
        </select>

        <h2>Image du road trip</h2>
        <input type="file" name="file" id="image" accept="image/png, image/jpeg" value=<?= $data['image']->getFilepath() ?> required>

        <button type="submit">Modifier</button>
    </form>
    <h2>Étapes</h2>

    <table>
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom de l’étape</th>
                <th>Coordonnées</th>
                <th>Date d'arrivée</th>
                <th>Date de départ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['steps'] as $step) : ?>
                <tr>
                    <td><?= $step->getNumber() ?></td>
                    <td><?= $step->getName() ?></td>
                    <td><?= $step->getCoordinates() ?></td>
                    <td><?= date('d/m/Y', strtotime($step->getDate_arrival())) ?></td>
                    <td><?= date('d/m/Y', strtotime($step->getDate_departure())) ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="delete-step">
                            <input type="hidden" name="step-id" value="<?= $step->getId() ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Ajouter une étape</h2>
    <form action="" method="post">
        <input type="hidden" name="add-step">

        <input type="text" name="step-name" id="step-name" placeholder="Nom de l’étape" required>
        <input type="number" name="step-number" id="step-number" placeholder="Numéro de l’étape" required>
        <input type="text" name="step-coordonates" id="step-coordonates" placeholder="Coordonnée GPS" required>
        <input type="date" name="step-departure-date" id="step-departure-date" placeholder="Date d’arrivée" required>
        <input type="date" name="step-arrival-date" id="step-arrival-date" placeholder="Date de départ" required>

        <button type="submit">Ajouter</button>
    </form>

    <div class="delete">
        <h2>Supprimer le roadtrip</h2>
        <p>Attention, cette action est irréversible.</p>
        <form method="post">
            <input type="hidden" name="delete-roadtrip">
            <button type="submit">Supprimer le road trip</button>
        </form>
    </div>
</div>