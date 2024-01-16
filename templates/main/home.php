<div class="container">
    <?php

    // A TITRE D'EXEMPLE
    use Plugo\Services\Flash\Flash;

    $flash = new Flash();

    ?>

    <h1>Home</h1>

    <div>
        <?php $flash->display_all_flash_messages(); ?>
    </div>
</div>