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
        <div class="movie-button">
            <a href="/?action=movie/add" class="landing-actions">+ Ajouter un film</a>
        </div>
        <h2>Mes films</h2>
        <?php if ($my_movies) { ?>
            <div class="movie-container movie-container__home">
                <?php foreach ($my_movies as $my_movie) { ?>
                    <div class="movie-element">
                        <img src="data:image/png;base64, <?= base64_encode($my_movie['image']) ?>" class="movie-element__image">
                        <div class="movie-element__info">
                            <h3><?= $my_movie['title'] ?></h3>
                            <span><?= $my_movie['type'] ?></span>
                            <span>|</span>
                            <span><?= $my_movie['releasedate'] ?></span>
                        </div>
                        <div class="movie-element__actions">
                            <a href="/?action=movie/show/<?= $my_movie['id']; ?>"><img src="assets/img/eye.png" alt=""></a>
                            <a href="/?action=movie/edit/<?= $my_movie['id']; ?>"><img src="assets/img/edit.png" alt=""></a>
                            <a href="/?action=movie/delete/<?= $my_movie['id']; ?>"><img src="assets/img/delete.png" alt=""></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <a href="/?action=movie/add">Ajouter un film</a>
            <p>Vous n'avez aucun film. Ajouter en un dès maintenant !</p>
        <?php } ?>

        <h2>Tous les films</h2>
        <?php if ($my_movies) { ?>
            <div class="movie-container movie-container__home">
                <?php foreach ($my_movies as $my_movie) { ?>
                    <div class="movie-element">
                        <img src="data:image/png;base64, <?= base64_encode($my_movie['image']) ?>" class="movie-element__image">
                        <div class="movie-element__info">
                            <h3><?= $my_movie['title'] ?></h3>
                            <span><?= $my_movie['type'] ?></span>
                            <span>|</span>
                            <span><?= $my_movie['releasedate'] ?></span>
                        </div>
                        <div class="movie-element__actions">
                            <?php if ($my_movie['user_id'] === $_SESSION['user_id']) { ?>
                                <a href="/?action=movie/show/<?= $my_movie['id']; ?>"><img src="assets/img/eye.png" alt=""></a>
                                <a href="/?action=movie/edit/<?= $my_movie['id']; ?>"><img src="assets/img/edit.png" alt=""></a>
                                <a href="/?action=movie/delete/<?= $my_movie['id']; ?>"><img src="assets/img/delete.png" alt=""></a>
                            <?php } else { ?>
                                <a href="/?action=movie/show/<?= $my_movie['id']; ?>"><img src="assets/img/eye.png" alt=""></a>
                            <?php } ?>

                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <a href="/?action=movie/add">Ajouter un film</a>
            <p>il n'existe aucun film sur cette plateforme. Ajouter en un dès maintenant !</p>
        <?php } ?>
    </main>
</body>

</html>