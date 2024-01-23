<div class="w-full relative">
    <?php if (isset($_SESSION['FLASH_MESSAGES']['roadtrips'])) : ?>
        <div class="absolute shadow-main rounded-main top-2 right-2 text-sm md:text-base left-2 text-center md:text-left md:left-auto py-2 px-4 lg:top-8 lg:right-8 md:py-4 md:px-8 bg-white z-[80]">
            <?php $data['flash']->display_flash_message('roadtrips'); ?>
        </div>
    <?php endif; ?>

    <section class="bg-roadtrips bg-center bg-no-repeat bg-cover h-60 lg:h-96">
        <div class="flex flex-col text-white justify-center items-center w-full h-full bg-filter gap-4 px-4 lg:gap-8 py-2">
            <h1 class="font-second text-xl lg:text-4xl">Mon carnet de voyage</h1>
            <a href="?path=/roadtrip/ajouter" class="bg-orange text-xs lg:text-sm py-2 px-4 lg:py-4 lg:px-8 lg:gap-3 rounded-main flex gap-1 items-center">Ajouter un road trip<img src="/images/icons/add.svg" alt="add icon" class="h-4 lg:h-6"></a>
        </div>
    </section>

    <section class="grid pt-8 px-6 md:grid-cols-2 lg:grid-cols-3 lg:gap-6 lg:px-10 xl:px-24 xl:gap-10 lg:pt-12 gap-4">
        <?php foreach ($data['roadtrips'] as $roadtrip) : ?>
            <article class="shadow-main rounded-main py-4 px-4 relative">
                <a href=<?= '/?path=/roadtrip/' . $roadtrip->getId() ?>>
                    <img src="/images/home.jpg" alt="" class="rounded-main" />

                    <div class="py-2 flex flex-col gap-4">
                        <h2 class="text-xl font-second font-medium text-blue"><?= $roadtrip->getName() ?></h2>
                        <div class="flex items-center gap-4 lg:gap-6 xl:gap-12">
                            <span class="flex items-center gap-2">
                                <img class="h-7 xl:h-9" src="/images/icons/compass.svg" alt="compass icon">
                                <p class="font-medium text-sm md:text-base">1 256 km</p>
                            </span>
                            <span class="flex items-center gap-2">
                                <img class="h-7 xl:h-9" src="/images/icons/crossroads.svg" alt="steps icon">
                                <p class="font-medium text-sm md:text-base"><?= $roadtrip->getStepsNumber() ?> étapes</p>
                            </span>
                        </div>
                        <span class="flex items-center gap-2">
                            <img class="h-7 xl:h-9" src="/images/icons/location.svg" alt="location icon">
                            <p class="font-medium text-sm md:text-base">De : <?= $roadtrip->getSteps()[0]->getName() ?></p>
                        </span>
                        <span class="flex items-center gap-2">
                            <img class="h-7 xl:h-9" src="/images/icons/location.svg" alt="location icon">
                            <p class="font-medium text-sm md:text-base">À : <?= $roadtrip->getSteps()[$roadtrip->getStepsNumber() - 1]->getName() ?></p>
                        </span>
                    </div>
                </a>
                <a href=<?= '/?path=/roadtrip/' . $roadtrip->getId() . '/editer' ?> class="absolute top-6 right-6 bg-orange rounded-main p-2">
                    <img src="/images/icons/pen.svg" alt="edit icon" />
                </a>
            </article>
        <?php endforeach; ?>
    </section>
</div>