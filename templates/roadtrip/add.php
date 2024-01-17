<div class="container">

    <h1>Ajouter un roadtrip</h1>

    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="add-roadtrip">

        <input type="text" name="name" id="name" placeholder="Nom du road trip" required>

        <h2>Type de véhicule</h2>
        <select name="vehicle" id="vehicle" required>
            <?php foreach ($data['vehicles'] as $vehicle) : ?>
                <option value="<?= $vehicle->getId() ?>"><?= $vehicle->getName() ?></option>
            <?php endforeach; ?>
        </select>

        <h2>Image du road trip</h2>
        <input type="file" name="file" id="image" required>

        <h2>Départ</h2>
        <input type="text" name="first-step-name" id="first-step-name" placeholder="Nom de l’étape" required>
        <input type="number" name="first-step-number" id="first-step-number" placeholder="Numéro de l’étape" required>
        <input type="text" name="first-step-coordonates" id="first-step-coordonates" placeholder="Coordonnée GPS" required>
        <input type="date" name="first-step-departure-date" id="first-step-departure-date" placeholder="Date d’arrivée" required>
        <input type="date" name="first-step-arrival-date" id="first-step-arrival-date" placeholder="Date de départ" required>

        <h2>Arrivée</h2>
        <input type="text" name="last-step-name" id="last-step-name" placeholder="Nom de l’étape" required>
        <input type="number" name="last-step-number" id="last-step-number" placeholder="Numéro de l’étape" required>
        <input type="text" name="last-step-coordonates" id="last-step-coordonates" placeholder="Coordonnée GPS" required>
        <input type="date" name="last-step-departure-date" id="last-step-departure-date" placeholder="Date d’arrivée" required>
        <input type="date" name="last-step-arrival-date" id="last-step-arrival-date" placeholder="Date de départ" required>
        <button type="submit">Ajouter</button>
    </form>
</div>