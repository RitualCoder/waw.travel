<div class="w-full relative">
    <?php if (isset($_SESSION['FLASH_MESSAGES']['profil'])) : ?>
        <div class="absolute shadow-main rounded-main top-2 right-2 text-sm md:text-base left-2 text-center md:text-left md:left-auto py-2 px-4 lg:top-16 lg:right-8 md:py-4 md:px-8 bg-white z-[120]">
            <?php $data['flash']->display_flash_message('profil'); ?>
        </div>
    <?php endif; ?>

    <section class="flex md:gap-8 items-center bg-profil md:bg-none bg-cover bg-no-repeat bg-center py-16 justify-center md:flex md:py-0 md:justify-normal lg:justify-between md:h-[30rem] overflow-hidden lg:gap-0 xl:h-[34rem]">

        <div class="w-11/12 md:w-1/2 xl:w-2/6 flex justify-end lg:justify-center items-center">
            <div class="bg-white shadow-main rounded-main py-4 px-8 items-center text-center md:w-4/5 flex flex-col gap-4 md:justify-between mx-auto">
                <h1 class="text-xl text-blue font-medium font-second xl:text-3xl w-full text-center">Mon profil</h1>
                <p class="font-medium text-sm md:text-base">Username : <span class="text-blue"><?= $data['user']->getUsername() ?></span></p>
                <p class="font-medium text-sm md:text-base">Email : <span class="text-blue"><?= $data['user']->getEmail() ?></span></p>
                <span class="flex items-center gap-2">
                    <img src="images/icons/earth.svg" alt="earth icon" class="h-6">
                    <p class="font-medium text-sm md:text-base"><?= $data['user']->getRoadtripsNumber() ?> roadtrips</p>
                </span>
                <a href="/roadtrips" class="bg-orange text-white py-2 px-6 rounded-main">Mon carnet de voyage</a>
                <p class="font-medium text-xs md:text-sm">Membre depuis le : <span class="text-blue"><?= date('d/m/Y', strtotime($data['user']->getCreated_at())) ?></span></p>
                <a href="/deconnexion" class="bg-red text-white rounded-main py-2 px-6">Se déconnecter</a>
            </div>
        </div>
        <img src="images/profil.jpg" alt="login image" class="hidden md:flex lg:flex md:h-full lg:h-full md:w-1/2 xl:w-4/6 overflow-hidden object-cover object-center rounded-bl-main m-0">
    </section>
    <section class="flex flex-col pt-8 items-center gap-4 w-4/5 mx-auto">
        <h2 class="font-medium text-center mb-2 text-lg font-second lg:text-xl text-orange">Modifier mon pseudo</h2>

        <form method="post" class="flex flex-col items-center gap-4">
            <input type="hidden" name="edit-username">
            <input name="username" type="text" placeholder="Pseudo" class="border-orange text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-orange focus:ring-0 bg-white" required>
            <button type="submit" class="bg-orange text-sm rounded-main px-4 py-2 mx-auto text-white mt-4 lg:text-lg lg:px-6 lg:py-3">Modifier</button>
        </form>

        <h2 class="font-medium text-center mb-2 text-lg font-second lg:text-xl text-blue">Modifier mon email</h2>

        <form method="post" class="flex flex-col items-center gap-4">
            <input type="hidden" name="edit-email">
            <input name="email" id="email" type="email" placeholder="Email" class="border-blue text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-blue focus:ring-0 bg-white" required>
            <button type="submit" class="bg-blue text-sm rounded-main px-4 py-2 mx-auto text-white mt-4 lg:text-lg lg:px-6 lg:py-3">Modifier</button>
        </form>

        <h2 class="font-medium text-center mb-2 text-lg font-second lg:text-xl text-orange">Modifier mon mot de passe</h2>

        <form method="post" class="flex flex-col items-center gap-4">
            <input type="hidden" name="edit-password">
            <input name="password" id="password" type="password" placeholder="Mot de passe" class="border-orange text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-orange focus:ring-0 bg-white" required>
            <button type="submit" class="bg-orange text-sm rounded-main px-4 py-2 mx-auto text-white mt-4 lg:text-lg lg:px-6 lg:py-3">Modifier</button>
        </form>

        <div class="w-full md:w-4/5 mx-auto flex flex-col items-center border-red border-2 rounded-main mt-6 gap-4 py-4 px-8 xl:w-3/5">
            <h2 class="font-medium text-center text-lg font-second lg:text-xl text-red">Supprimer mon compte</h2>
            <p class="text-red font-medium text-center">Attention, cette action est irréversible.</p>
            <form method="post" class="flex flex-col items-center gap-4">
                <input type="hidden" name="delete-account">
                <input name="deletePassword" id="deletePassword" type="password" placeholder="Mot de passe" class="border-red text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-lg lg:px-6 lg:py-3 focus:outline-none focus:border-2 focus:border-red focus:ring-0 bg-white" required>
                <button type="submit" class="bg-red text-sm rounded-main px-4 py-2 mx-auto text-white lg:text-lg lg:px-6 lg:py-3">Supprimer</button>
            </form>
        </div>
    </section>
</div>