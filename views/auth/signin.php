<?php ?>

<h1>Inscription</h1>

<form action="/?action=user/signin" method="post">
    <label for="login">Identifiant</label><input type="text" name="login" id="login">
    <label for="email">Email</label><input type="email" name="email" id="email">
    <label for="password">Mot de passe</label><input type="password" name="password" id="password">
    <input type="submit" value="S'inscrire">    
</form>

<p>Vous avez déja un compte? <a href="/?action=user/login">Se connecter</a>