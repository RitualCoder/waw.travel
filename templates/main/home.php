<div class="w-full relative">
  <?php if (isset($_SESSION['FLASH_MESSAGES']['home'])) : ?>
    <div class="absolute shadow-main rounded-main top-2 right-2 text-sm md:text-base left-2 text-center md:text-left md:left-auto py-2 px-4 lg:top-8 lg:right-8 md:py-4 md:px-8 bg-white z-[80]">
      <?php $data['flash']->display_flash_message('home'); ?>
    </div>
  <?php endif; ?>

  <section class="bg-home bg-center bg-no-repeat bg-cover h-auto md:h-60 lg:h-96">
    <div class="flex flex-col text-white justify-center items-center w-full h-full bg-filter py-4 gap-4 lg:gap-8 px-4 md:px-8 lg:px-16">
      <h1 class="font-second text-xl lg:text-4xl">Partagez vos voyages</h1>
      <p class="w-11/12 xl:w-1/2 mx-auto text-center font-medium text-base lg:text-lg">Découvrez des itinéraires captivants, des récits inspirants et des conseils pour des voyages inoubliables. Rejoignez une communauté passionnée de voyageurs. Prêt pour l'évasion ?</p>
    </div>
  </section>
  <h2 class="font-medium text-center mb-2 text-lg font-second lg:text-2xl text-orange mt-6 lg:mt-8">Nos derniers ajouts</h2>
  <section class="grid pt-8 px-6 md:grid-cols-2 lg:grid-cols-3 lg:gap-6 lg:px-12 xl:px-20 lg:pt-12 gap-4">
    <?php foreach ($data['roadtrips'] as $roadtrip) : ?>
      <article class="shadow-main rounded-main py-4 px-4">
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
      </article>
    <?php endforeach; ?>
  </section>
</div>