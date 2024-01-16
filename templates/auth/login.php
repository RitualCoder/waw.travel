<div class="container">
    <h1>Connexion</h1>

    <form method="post">
        <label for="email">Email :</label>
        <input name="email" id="email" type="email" placeholder="Email">
        <label for="password">Mot de passe :</label>
        <input name="password" id="password" type="password" placeholder="Mot de passe">
        <button type="submit">Se connecter</button>
    </form>
    <div>
        <?php $data["flash"]->display_flash_message('login'); ?>
    </div>
</div>