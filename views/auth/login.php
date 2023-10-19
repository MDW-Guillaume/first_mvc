<?php ?>
<h1>Connexion</h1>

<form action="/?action=user/login" method="post">
    <label>Identifiant</label><input type="text" name="email" id="">
    <label>Mot de passe</label><input type="password" name="password" id="">
    <input type="submit" value="Se connecter">
</form>

<p>Pas encore de compte? <a href="/?action=user/signin">S'inscrire</a>