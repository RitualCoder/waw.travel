<div class="container">
    <?php

    // A TITRE D'EXEMPLE
    use Plugo\Services\Flash\Flash;

    $flash = new Flash();

    ?>

    <h1>Home</h1>
    <form action="?path=/" method="post" enctype="multipart/form-data">
        <label for="file">Fichier</label>
        <input type="file" name="file">
        <button type="submit">Enregistrer</button>
    </form>

    <div>
        <?php $flash->display_all_flash_messages(); ?>
    </div>
</div>