<?php
$image = $data['roadtrip']->getImage();
$imageFilepath = $image->getFilepath();
$vehicle = $data['roadtrip']->getVehicle();
$vehicleName = $vehicle->getName();
$vehicleIcon = $vehicle->getIcon();
$user = $data['roadtrip']->getUser();
$username = $user->getUsername();

?>

<div class="w-full">
    <section class="flex md:gap-8 items-center bg-home md:bg-none bg-cover bg-no-repeat bg-center py-4 justify-center md:flex md:py-0 md:h-80 md:justify-normal lg:justify-between lg:h-96 overflow-hidden lg:gap-0">
        <div class="md:w-2/5 xl:w-2/6 flex justify-end lg:justify-center items-center">
            <div class="bg-white shadow-main rounded-main py-4 px-8 items-center flex flex-col gap-4 md:justify-between">
                <h1 class="text-xl text-center font-medium font-second w-4/5"><?= $data['roadtrip']->getName() ?></h1>
                <div class="flex items-center gap-4 lg:gap-12">
                    <span class="flex items-center gap-2">
                        <img class="h-7 lg:h-9" src=<?= 'images/icons/' . $vehicleIcon . '.svg' ?> alt="<?= $vehicleName . ' icon' ?>">
                        <p class="font-medium text-sm md:text-base"><?= $vehicleName ?></p>
                    </span>
                    <span class="flex items-center gap-2">
                        <img class="h-7 lg:h-9" src="images/icons/compass.svg" alt="compass icon">
                        <p class="font-medium text-sm md:text-base">1 256 km</p>
                    </span>
                </div>
                <span class="flex items-center gap-2">
                    <img class="h-7 lg:h-9" src="images/icons/location.svg" alt="location icon">
                    <p class="font-medium text-sm md:text-base">De : <?= $data['roadtrip']->getSteps()[0]->getName() ?></p>
                </span>
                <span class="flex items-center gap-2">
                    <img class="h-7 lg:h-9" src="images/icons/location.svg" alt="location icon">
                    <p class="font-medium text-sm md:text-base">À : <?= $data['roadtrip']->getSteps()[$data['roadtrip']->getStepsNumber() - 1]->getName() ?></p>
                </span>
                <span class="flex items-center gap-2">
                    <img class="h-7 lg:h-9" src="images/icons/crossroads.svg" alt="étapes icon">
                    <p class="font-medium text-sm md:text-base"><?= $data['roadtrip']->getStepsNumber() ?> étapes</p>
                </span>
                <p class="font-medium text-xs md:text-sm">Par <span class="text-blue"><?= $username ?></span></p>
            </div>
        </div>
        <img src="images/home.jpg" alt=<?= $data['roadtrip']->getName() ?> class="hidden md:flex lg:flex md:h-full lg:h-full md:w-3/5 xl:w-4/6 overflow-hidden object-cover object-center rounded-bl-main m-0">
    </section>
    <section class="py-4 flex justify-center">
        <table class="w-4/5 mx-auto">
            <thead class="hidden md:flex">
                <tr class="font-second md:text-sm md:grid md:grid-cols-[5%,5%,20%,30%,20%,20%] w-full px-4 py-2 lg:text-base lg:py-4">
                    <th class="my-auto"> </th>
                    <th class="my-auto">N°</th>
                    <th class="my-auto">Nom de l’étape</th>
                    <th class="my-auto">Coordonnées</th>
                    <th class="my-auto">Date d’arrivée</th>
                    <th class="my-auto">Date de départ</th>
                </tr>
            </thead>
            <tbody class="gap-8 flex flex-col">
                <?php foreach ($data['roadtrip']->getSteps() as $step) : ?>
                    <tr class="block shadow-main rounded-main py-2 px-4 md:grid md:grid-cols-[5%,5%,20%,30%,20%,20%] w-full">
                        <td class="py-2 block"><img src="images/icons/milestone.svg" alt="step icon" class="h-7 mx-auto md:mx-0"></td>
                        <td class="lg:text-base font-medium py-2 block before:content-[attr(data-label)] before:float-left text-right before:font-medium md:before:hidden md:text-center" data-label="N°"><?= $step->getNumber() ?></td>
                        <td class="lg:text-base font-medium py-2 block before:content-[attr(data-label)] before:float-left text-right before:font-medium md:before:hidden md:text-center" data-label="Nom de l'étape"><?= $step->getName() ?></td>
                        <td class="lg:text-base text-blue before:text-black py-2 block before:content-[attr(data-label)] before:float-left text-right before:font-medium md:before:hidden md:text-center" data-label="Coordonnées">(<?= $step->getCoordinates() ?>)</td>
                        <td class="lg:text-base py-2 block before:content-[attr(data-label)] before:float-left text-right before:font-medium md:before:hidden md:text-center" data-label="Date d’arrivée"><?= date('d/m/Y', strtotime($step->getDate_arrival())) ?></td>
                        <td class="lg:text-base py-2 block before:content-[attr(data-label)] before:float-left text-right before:font-medium md:before:hidden md:text-center" data-label="Date de départ"><?= date('d/m/Y', strtotime($step->getDate_departure())) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <section class="flex justify-end lg:justify-center items-center px-16 mt-10">
        <div id="map" style="height: 400px; width: 100%;"></div>
    </section>
    <script>
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
        })
        ({
            key: "AIzaSyBQaXUH_JAVuswnfgJkeQ4yTZwjRjAcxj8",
            v: "beta"
        });
    </script>
    <script>
        // Initialize and add the map
        let map;

        async function initMap() {
            // Request needed libraries.
            const {
                Map,
            } = await google.maps.importLibrary("maps");
            const {
                AdvancedMarkerView
            } = await google.maps.importLibrary("marker");

            <?php
            // Récupérez les étapes et triez-les par leur numéro
            $steps = $data['roadtrip']->getSteps();
            usort($steps, function ($a, $b) {
                return $a->getNumber() - $b->getNumber();
            });
            ?>

            // Utilisez maintenant $steps pour afficher les waypoints dans le code JavaScript
            const waypoints = [];
            <?php foreach ($steps as $step) : ?>
                waypoints.push({
                    location: new google.maps.LatLng(<?= $step->getLatitude() ?>, <?= $step->getLongitude() ?>),
                    stopover: false
                });
            <?php endforeach; ?>

            console.log(waypoints);

            // The map, centered at Uluru
            map = new Map(document.getElementById("map"), {
                zoom: 6,
                center: waypoints[0].location,
                mapId: "DEMO_MAP_ID",
            });

            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer({
                map: map
            });

            // Configure the request
            const request = {
                origin: waypoints[0].location,
                destination: waypoints[waypoints.length - 1].location,
                waypoints: waypoints,
                travelMode: google.maps.TravelMode.DRIVING
            };

            // Calculate the route and display it on the map
            directionsService.route(request, function(result, status) {
                if (status === 'OK') {
                    directionsRenderer.setDirections(result);

                    // Accessing the distance information
                    const distance = result.routes[0].legs.reduce((total, leg) => total + leg.distance.value, 0);

                    // Convert distance from meters to kilometers
                    const distanceInKilometers = distance / 1000;

                    // Afficher la distance dans la console (vous pouvez l'afficher à un autre endroit selon vos besoins)
                    console.log(`Distance totale : ${distanceInKilometers} km`);
                } else {
                    console.error('Error calculating the route:', status);
                }
            });
        }

        initMap();
    </script>
</div>