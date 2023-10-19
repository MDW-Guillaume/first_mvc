<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Connexion</title>
</head>

<body>
    <?php include_once('views/layout/header.php'); ?>

    <main>
        <h1>Connexion</h1>

        <form action="/?action=user/login" method="post" class="landing-form">
            <label>Identifiant</label><input type="text" name="email" id="">
            <label>Mot de passe</label><input type="password" name="password" id="">
            <input type="submit" value="Se connecter" class="landing-actions">
        </form>

        <p>Pas encore de compte? <a href="/?action=user/signin">S'inscrire</a>

    </main>
</body>

</html>