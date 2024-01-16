<div class="container">

    <h1>Home</h1>
    <a href="?path=/profil">Mon profil</a>
    <form action="?path=/" method="post" enctype="multipart/form-data">
        <label for="file">Fichier</label>
        <input type="file" name="file">
        <button type="submit">Enregistrer</button>
    </form>

    <div>
        <?php $data['flash']->display_all_flash_messages(); ?>
    </div>
</div>