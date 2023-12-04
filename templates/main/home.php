<div class="container">
    <?php

    // A TITRE D'EXEMPLE
    use Plugo\Services\Flash\Flash;
    $flash = new Flash();
    $flash->create_flash_message('test', 'This is a test message', Flash::FLASH_SUCCESS);
    //

    ?>

    <h1>Home</h1>

    <div>
        <h2>FLASH MESSAGE :</h2>
        <?php $flash->display_flash_message('test'); ?>
    </div>
</div>