<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title><?= $movie['title']; ?></title>
</head>
<body>
    <?php include('views/layout/header.php'); ?>

    <main>
        <div class="movie-back">
            <a href="/" class="movie-back__button landing-actions">< Retour à la liste</a>
        </div>
        <h2 class="title"><?= $movie['title']; ?></h2>

        <div class="movie-container movie-contaier__edit">
            <div class="movie-image">
                <img src = "data:image/png;base64, <?= base64_encode($movie['image']) ?>"/>
            </div>
            <div class="movie-form">
                <div class="movie-form_group">
                    <div><span>Titre</span><span><?= $movie['title'] ?></span></div>
                    <div><span>Réalisateur</span><span><?= $movie['director'] ?></span></div>
                </div>
                <div class="movie-form_group">
                    <div><span>Synopsis</span><span><?= $movie['synopsis'] ?></span></div>
                    <div><span>Genre</span><span><?= $movie['type'] ?></span></div>
                </div>
                <div class="movie-form_group">
                    <div><span>Sénariste</span><span><?= $movie['senarist'] ?></span></div>
                    <div><span>Producteurs</span><span><?= $movie['producer'] ?></span></div>
                </div>
                <div class="movie-form_group">
                    <div><span>Année de sortie</span><span><?= $movie['releasedate'] ?></span></div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>