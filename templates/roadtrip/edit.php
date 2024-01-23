<div class="w-full flex flex-col pt-8 items-center relative">
    <?php if (isset($_SESSION['FLASH_MESSAGES']['edit-roadtrip'])) : ?>
        <div class="fixed shadow-main rounded-main top-20 right-2 text-sm md:text-base left-2 text-center md:text-left md:left-auto py-2 px-4 lg:top-8 lg:right-8 md:py-4 md:px-8 bg-white z-[120]">
            <?= $data['flash']->display_flash_message('edit-roadtrip'); ?>
        </div>
    <?php endif; ?>

    <h1 id="roadtrip" class="text-xl text-orange font-medium font-second lg:text-4xl">Éditer un road trip</h1>

    <a href=<?= "?path=/roadtrip/" . $data['roadtrip']->getId() ?> class="border-orange border-2 text-orange font-medium py-2 px-6 rounded-main mt-4 lg:text-lg lg:px-6 lg:py-3">Voir le road trip</a>

    <form method="post" enctype="multipart/form-data" class="flex flex-col gap-4 w-4/5 mx-auto mt-6 md:w-3/5">
        <input type="hidden" name="edit-roadtrip">

        <input type="text" name="name" id="name" value=<?= $data['roadtrip']->getName() ?> required class="border-orange text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-orange focus:ring-0">

        <h2 class="font-medium text-center mb-2 text-lg font-second lg:text-xl">Type de véhicule</h2>

        <select name="vehicle" id="vehicle" required class="border-orange text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-orange focus:ring-0">
            <?php foreach ($data['vehicles'] as $vehicle) :
                if ($vehicle->getId() == $data['roadtrip']->getVehicle_id()) { ?>
                    <option value="<?= $vehicle->getId() ?>" selected><?= $vehicle->getName() ?></option>
                <?php } else { ?>
                    <option value="<?= $vehicle->getId() ?>"><?= $vehicle->getName() ?></option>
            <?php }
            endforeach; ?>
        </select>

        <h2 class="font-medium text-center mb-2 text-lg font-second lg:text-xl">Image du road trip</h2>
        <input type="file" name="file" id="image" accept="image/png, image/jpeg" value=<?= $data['roadtrip']->getImage()->getFilepath() ?> required class="border-orange text-sm rounded-main border-2 py-1 px-3 placeholder:text-black file:bg-orange file:text-white file:rounded-main file:border-orange file:border file:px-2 focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-orange focus:ring-0 file:mr-4">

        <button type="submit" class="bg-orange text-sm rounded-main px-4 py-2 mx-auto text-white mt-4 lg:text-lg lg:px-6 lg:py-3">Modifier</button>
    </form>
    <h2 id="step" class="font-medium text-center mb-2 text-lg font-second lg:text-xl py-4 mt-2">Étapes</h2>

    <table class="w-4/5 mx-auto md:w-11/12 lg:w-4/5">
        <thead class="hidden md:flex">
            <tr class="font-second md:grid md:grid-cols-[5%,20%,30%,20%,20%] w-full px-4 py-2 lg:text-base lg:py-4 text-orange">
                <th class="my-auto">N°</th>
                <th class="my-auto">Nom de l’étape</th>
                <th class="my-auto">Coordonnées</th>
                <th class="my-auto">Date d'arrivée</th>
                <th class="my-auto">Date de départ</th>
                <th class="my-auto"> </th>
            </tr>
        </thead>
        <tbody class="flex flex-col w-full gap-4 md:gap-0">
            <?php foreach ($data['roadtrip']->getSteps() as $step) : ?>
                <tr class="block rounded-main md:rounded-0 shadow-main md:shadow-null px-4 md:grid md:grid-cols-[5%,20%,30%,20%,20%,5%] w-full">
                    <td class="lg:text-base py-2 block before:content-[attr(data-label)] before:float-left text-right before:font-medium md:before:hidden md:border-r md:border-orange md:text-center" data-label="N°"><?= $step->getNumber() ?></td>
                    <td class="lg:text-base py-2 block before:content-[attr(data-label)] before:float-left text-right before:font-medium md:before:hidden md:border-r md:border-orange  md:text-center" data-label="Nom de l’étape"><?= $step->getName() ?></td>
                    <td class="lg:text-base py-2 block before:content-[attr(data-label)] before:float-left text-right before:font-medium md:before:hidden md:border-r md:border-orange  md:text-center" data-label="Coordonnées"><?= $step->getCoordinates() ?></td>
                    <td class="lg:text-base py-2 block before:content-[attr(data-label)] before:float-left text-right before:font-medium md:before:hidden md:border-r md:border-orange  md:text-center" data-label="Date d'arrivée"><?= date('d/m/Y', strtotime($step->getDate_arrival())) ?></td>
                    <td class="lg:text-base py-2 block before:content-[attr(data-label)] before:float-left text-right before:font-medium md:before:hidden md:border-r md:border-orange  md:text-center" data-label="Date de départ"><?= date('d/m/Y', strtotime($step->getDate_departure())) ?></td>
                    <td class="mx-auto w-full py-2 flex items-center justify-center">
                        <form method="post" class="w-full">
                            <input type="hidden" name="delete-step">
                            <input type="hidden" name="step-id" value="<?= $step->getId() ?>">
                            <button type="submit" class="flex items-center mx-auto">
                                <img src="images/icons/close.svg" alt="close icon" class="hidden md:block h-7">
                                <span class="md:hidden text-orange">Supprimer</span>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2 class="font-medium text-center mb-2 text-lg font-second lg:text-xl py-4 mt-2">Ajouter une étape</h2>
    <form action="" method="post" class="flex flex-col gap-4 w-4/5 mx-auto md:w-3/5">
        <input type="hidden" name="add-step">

        <input type="text" name="step-name" id="step-name" placeholder="Nom de l’étape" required class="border-orange text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-orange focus:ring-0">
        <input type="number" name="step-number" id="step-number" placeholder="Numéro de l’étape" required class="border-orange text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-orange focus:ring-0">
        <input type="text" name="step-latitude" id="step-latitude" placeholder="Latitude" required class="border-orange text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-orange focus:ring-0">
        <input type="text" name="step-longitude" id="step-longitude" placeholder="Longitude" required class="border-orange text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-orange focus:ring-0">
        <label for="first-step-departure-date" class="lg:text-lg">Date d'arrivée :</label>
        <input type="date" name="step-departure-date" id="step-departure-date" placeholder="Date d’arrivée" required class="border-orange text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-orange focus:ring-0">
        <label for="first-step-departure-date" class="lg:text-lg">Date de départ :</label>
        <input type="date" name="step-arrival-date" id="step-arrival-date" placeholder="Date de départ" required class="border-orange text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-orange focus:ring-0">

        <button type="submit" class="bg-orange text-sm rounded-main px-4 py-2 mx-auto text-white mt-4 lg:text-lg lg:px-6 lg:py-3">Ajouter</button>
    </form>

    <div class="w-4/5 mx-auto flex flex-col items-center border-red border-2 rounded-main mt-6 gap-6 py-4 px-8 xl:w-3/5">
        <h2 class="font-medium text-center text-lg font-second lg:text-xl text-red">Supprimer le roadtrip</h2>
        <p class="text-red font-medium text-center">Attention, cette action est irréversible.</p>
        <form method="post" class="flex flex-col gap-4 md:w-3/5">
            <input type="hidden" name="delete-roadtrip">
            <button type="submit" class="bg-red text-sm rounded-main px-4 py-2 mx-auto text-white lg:text-lg lg:px-6 lg:py-3">Supprimer le road trip</button>
        </form>
    </div>
</div>