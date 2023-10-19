<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Inscription</title>
</head>

<body>
    <?php include_once('views/layout/header.php'); ?>

    <main>
        <h1>Inscription</h1>

        <form action="/?action=user/signin" method="post" class="landing-form">
            <label for="login">Identifiant</label><input type="text" name="login" id="login">
            <label for="email">Email</label><input type="email" name="email" id="email">
            <label for="password">Mot de passe</label><input type="password" name="password" id="password">
            <input type="submit" value="S'inscrire" class="landing-actions">
        </form>

        <p>Vous avez déja un compte? <a href="/?action=user/login">Se connecter</a>
    </main>
</body>

</html>