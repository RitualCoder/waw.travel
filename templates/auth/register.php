<div class="w-full relative">
    <?php if (isset($_SESSION['FLASH_MESSAGES']['connexion'])) : ?>
        <div class="absolute shadow-main rounded-main top-2 right-2 text-sm md:text-base left-2 text-center md:text-left md:left-auto py-2 px-4 lg:top-8 lg:right-8 md:py-4 md:px-8 bg-white z-[80]">
            <?php $data['flash']->display_flash_message('connexion'); ?>
        </div>
    <?php endif; ?>

    <section class="flex md:gap-8 items-center bg-register md:bg-none bg-cover bg-no-repeat bg-center py-16 justify-center md:flex md:py-0 md:justify-normal lg:justify-between md:h-[30rem] overflow-hidden lg:gap-0 xl:h-[34rem]">
        <div class="md:w-1/2 xl:w-2/6 flex justify-end lg:justify-center items-center">
            <div class="bg-white shadow-main rounded-main py-4 px-8 items-center w-4/5 flex flex-col gap-4 xl:gap-8 md:justify-between mx-auto">
                <h1 class="text-xl text-orange font-medium font-second xl:text-3xl">Inscription</h1>
                <?php if (isset($_SESSION['FLASH_MESSAGES']['register'])) : ?>
                    <?php $data['flash']->display_flash_message('register'); ?>
                <?php endif; ?>
                <form method="post" class="flex flex-col gap-4 xl:gap-8">
                    <input type="hidden" name="register">
                    <input name="username" id="username" type="text" placeholder="Pseudo" class="border-orange text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-base lg:px-4 lg:py-3 focus:outline-none focus:border-2 focus:border-orange focus:ring-0" required>
                    <input name="email" id="email" type="email" placeholder="Email" class="border-orange text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-base lg:px-4 lg:py-3 focus:outline-none focus:border-2 focus:border-orange focus:ring-0" required>
                    <input name="password" id="password" type="password" placeholder="Mot de passe" class="border-orange text-sm rounded-main border-2 py-1 px-3 placeholder:text-black focus-visible:outline-none lg:text-base lg:px-4 lg:py-3 focus:outline-none focus:border-2 focus:border-orange focus:ring-0" required>
                    <button type="submit" class="bg-orange text-sm rounded-main px-4 py-2 mx-auto text-white lg:text-lg lg:px-6 lg:py-3">S'inscrire</button>
                </form>
                <p class="text-center">Vous avez déjà un compte ? <a href="?path=/connexion" class="text-orange">Se connecter</a></p>
            </div>
        </div>
        <img src="/images/register.jpg" alt="login image" class="hidden md:flex lg:flex md:h-full lg:h-full md:w-1/2 xl:w-4/6 overflow-hidden object-cover object-center rounded-bl-main m-0">
    </section>
</div>