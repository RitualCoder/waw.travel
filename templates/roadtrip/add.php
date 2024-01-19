<div class="w-full flex flex-col pt-8 items-center">

    <h1 class="text-xl text-blue font-medium font-second lg:text-4xl">Ajouter un roadtrip</h1>

    <form method="post" enctype="multipart/form-data" class="flex flex-col gap-4 w-4/5 mx-auto mt-6 md:w-3/5">
        <input type="hidden" name="add-roadtrip">

        <input type="text" name="name" id="name" placeholder="Nom du road trip" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0">

        <h2 class="font-medium text-center mb-2 text-lg font-second lg:text-xl">Type de véhicule</h2>
        <select name="vehicle" id="vehicle" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0">
            <?php foreach ($data['vehicles'] as $vehicle) : ?>
                <option value="<?= $vehicle->getId() ?>"><?= $vehicle->getName() ?></option>
            <?php endforeach; ?>
        </select>

        <h2 class="font-medium text-center mb-2 text-lg font-second lg:text-xl">Image du road trip</h2>
        <input type="file" name="file" id="image" accept="image/png, image/jpeg" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black file:bg-blue file:text-white file:rounded-main file:border-blue file:border file:px-2 focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0 file:mr-4">

        <h2 class="font-medium text-center mb-2 text-lg font-second lg:text-xl">Départ</h2>
        <input type="text" name="first-step-name" id="first-step-name" placeholder="Nom de l’étape" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0">
        <input type="number" name="first-step-number" id="first-step-number" placeholder="Numéro de l’étape" required class="border-blue rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0">
        <input type="text" name="first-step-coordonates" id="first-step-coordonates" placeholder="Coordonnée GPS" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0">
        <label for="first-step-departure-date" class="lg:text-lg">Date d'arrivée :</label>
        <input type="date" name="first-step-arrival-date" id="first-step-arrival-date" placeholder="Date de départ" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0">
        <label for="first-step-departure-date" class="lg:text-lg">Date de départ :</label>
        <input type="date" name="first-step-departure-date" id="first-step-departure-date" placeholder="Date d’arrivée" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0">

        <h2 class="font-medium text-center mb-2 text-lg font-second lg:text-xl">Arrivée</h2>
        <input type="text" name="last-step-name" id="last-step-name" placeholder="Nom de l’étape" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0">
        <input type="number" name="last-step-number" id="last-step-number" placeholder="Numéro de l’étape" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0">
        <input type="text" name="last-step-coordonates" id="last-step-coordonates" placeholder="Coordonnée GPS" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0">
        <label for="last-step-departure-date" class="lg:text-lg">Date d'arrivée :</label>
        <input type="date" name="last-step-arrival-date" id="last-step-arrival-date" placeholder="Date de départ" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0">
        <label for="last-step-departure-date" class="lg:text-lg">Date de départ :</label>
        <input type="date" name="last-step-departure-date" id="last-step-departure-date" placeholder="Date d’arrivée" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0">
        <button type="submit" class="bg-blue text-sm rounded-main px-4 py-2 mx-auto text-white mt-4 lg:text-lg lg:px-6 lg:py-3">Ajouter</button>
    </form>
</div>