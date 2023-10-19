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
        <h2>Recherche pour <?= $search; ?></h2>
        <?php if ($searchedMovies) { ?>
            <div class="movie-container movie-container__home">
                <?php foreach ($searchedMovies as $searchedMovie) { ?>
                    <div class="movie-element">
                        <img src="data:image/png;base64, <?= base64_encode($searchedMovie['image']) ?>" class="movie-element__image">
                        <div class="movie-element__info">
                            <h3><?= $searchedMovie['title'] ?></h3>
                            <span><?= $searchedMovie['type'] ?></span>
                            <span>|</span>
                            <span><?= $searchedMovie['releasedate'] ?></span>
                        </div>
                        <div class="movie-element__actions">
                            <a href="/?action=movie/show/<?= $searchedMovie['id']; ?>"><img src="assets/img/eye.png" alt=""></a>
                            <a href="/?action=movie/edit/<?= $searchedMovie['id']; ?>"><img src="assets/img/edit.png" alt=""></a>
                            <a href="/?action=movie/delete/<?= $searchedMovie['id']; ?>"><img src="assets/img/delete.png" alt=""></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <p>Aucun film ne correspond à la recherche.</p>
            <a href="/">Retour à l'accueil</a>
        <?php } ?>
    </main>
</body>

</html>