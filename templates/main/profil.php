<h1> <?= $data['seo']['title'] ?> </h1>
<p> <?= $data['user']['username'] ?> </p>
<p> <?= $data['user']['email'] ?> </p>
<p>Membre de depuis le : <?= $data['user']['created_at'] ?> </p>

<h2>Modifier mon pseudo</h2>


<form method="post">
    <input name="username" type="text" placeholder="Pseudo">
    <button type="submit">Modifier</button>
</form>
<?php $data['flash']->display_flash_message('pseudo'); ?>

<h2>Modifier mon email</h2>

<form method="post">
    <input name="email" id="email" type="email" placeholder="Email">
    <button type="submit">Modifier</button>
</form>
<?php $data['flash']->display_flash_message('email'); ?>

<h2>Modifier mon mot de passe</h2>

<form method="post">
    <input name="password" id="password" type="password" placeholder="Mot de passe">
    <button type="submit">Modifier</button>
</form>
<?php $data['flash']->display_flash_message('password'); ?>

<a href="?path=/deconnexion" style="color: red;">Se déconnecter</a>