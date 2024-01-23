<div class="w-full flex flex-col pt-8 items-center relative">
    <?php if (isset($_SESSION['FLASH_MESSAGES']['add-roadtrip'])) : ?>
        <div class="fixed shadow-main rounded-main top-20 right-2 text-sm md:text-base left-2 text-center md:text-left md:left-auto py-2 px-4 lg:top-8 lg:right-8 md:py-4 md:px-8 bg-white z-[120]">
            <?= $data['flash']->display_flash_message('add-roadtrip'); ?>
        </div>
    <?php endif; ?>

    <h1 class="text-xl text-blue font-medium font-second lg:text-4xl">Ajouter un roadtrip</h1>

    <form method="post" enctype="multipart/form-data" class="flex flex-col gap-4 w-4/5 mx-auto mt-6 md:w-3/5">
        <input type="hidden" name="add-roadtrip">

        <input type="text" name="name" id="name" placeholder="Nom du road trip" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0 bg-white">

        <h2 class="font-medium text-center mb-2 text-lg font-second lg:text-xl">Type de véhicule</h2>
        <select name="vehicle" id="vehicle" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0 bg-white bg-white">
            <?php foreach ($data['vehicles'] as $vehicle) : ?>
                <option value="<?= $vehicle->getId() ?>"><?= $vehicle->getName() ?></option>
            <?php endforeach; ?>
        </select>

        <h2 class="font-medium text-center mb-2 text-lg font-second lg:text-xl">Image du road trip</h2>
        <input type="file" name="file" id="image" accept="image/png, image/jpeg" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black file:bg-blue file:text-white file:rounded-main file:border-blue file:border file:px-2 focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0 file:mr-4 bg-white">

        <h2 class="font-medium text-center mb-2 text-lg font-second lg:text-xl">Départ</h2>
        <input type="text" name="first-step-name" id="first-step-name" placeholder="Nom de l’étape" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0 bg-white">
        <input type="text" name="first-step-latitude" id="first-step-latitude" placeholder="Latitude" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0 bg-white">
        <input type="text" name="first-step-longitude" id="first-step-longitude" placeholder="Longitude" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0 bg-white">
        <label for="first-step-departure-date" class="lg:text-lg">Date d'arrivée :</label>
        <input type="date" name="first-step-arrival-date" id="first-step-arrival-date" placeholder="Date de départ" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0 bg-white">
        <label for="first-step-departure-date" class="lg:text-lg">Date de départ :</label>
        <input type="date" name="first-step-departure-date" id="first-step-departure-date" placeholder="Date d’arrivée" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0 bg-white">

        <h2 class="font-medium text-center mb-2 text-lg font-second lg:text-xl">Arrivée</h2>
        <input type="text" name="last-step-name" id="last-step-name" placeholder="Nom de l’étape" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0 bg-white">
        <input type="number" name="last-step-number" id="last-step-number" placeholder="Numéro de l’étape" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0 bg-white">
        <input type="text" name="last-step-latitude" id="last-step-latitude" placeholder="Latitude" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0 bg-white">
        <input type="text" name="last-step-longitude" id="last-step-longitude" placeholder="Longitude" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0 bg-white">
        <label for="last-step-departure-date" class="lg:text-lg">Date d'arrivée :</label>
        <input type="date" name="last-step-arrival-date" id="last-step-arrival-date" placeholder="Date de départ" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0 bg-white">
        <label for="last-step-departure-date" class="lg:text-lg">Date de départ :</label>
        <input type="date" name="last-step-departure-date" id="last-step-departure-date" placeholder="Date d’arrivée" required class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0 bg-white">
        <button type="submit" class="bg-blue text-sm rounded-main px-4 py-2 mx-auto text-white mt-4 lg:text-lg lg:px-6 lg:py-3">Ajouter</button>
    </form>
</div>