<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Accueil</title>
</head>

<body>
    <?php include_once('views/layout/header.php'); ?>

    <main>
        <h1>Accueil</h1>
        <?php echo $error; ?>
        <a href="/?action=user/login" class="landing-actions landing-actions__button">Se connecter</a>
        <a href="/?action=user/signin" class="landing-actions landing-actions__button">S'inscrire</a>
    </main>
</body>

</html>