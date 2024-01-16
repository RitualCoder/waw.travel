<div class="container">
    <h1>Inscription</h1>

    <form method="post">
        <label for="username">Pseudo :</label>
        <input name="username" id="username" type="text" placeholder="Pseudo">
        <label for="email">Email :</label>
        <input name="email" id="email" type="email" placeholder="Email">
        <label for="password">Mot de passe :</label>
        <input name="password" id="password" type="password" placeholder="Mot de passe">
        <button type="submit">S'inscrire</button>
    </form>
    <div>
        <?php $data["flash"]->display_flash_message('register'); ?>
    </div>
</div>