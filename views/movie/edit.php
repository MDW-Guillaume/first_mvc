<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title><?= $movie['title']; ?> - Modification</title>
</head>

<body>
    <?php include('views/layout/header.php'); ?>

    <main>
    <div class="movie-back">
            <a href="/" class="movie-back__button landing-actions">< Retour à la liste</a>
        </div>
        <h2 class="title">Modifier le film <?= $movie['title']; ?></h2>

        <div class="movie-contaier">
            <form action="/?action=movie/edit/<?= $movie['id'] ?>" method="POST" class="movie-form">
                <div class="movie-form_group">
                    <div><label for="movieTitle">Titre</label><input type="text" name="title" id="movieTitle" value="<?= $movie['title']; ?>"></div>
                    <div><label for="movieDirector">Réalisateur</label><input type="text" name="director" id="movieDirector" value="<?= $movie['director']; ?>"></div>
                </div>
                <div class="movie-form_group">
                    <div><label for="movieSynopsis">Synopsis</label><input type="text" name="synopsis" id="movieSynopsis" value="<?= $movie['synopsis']; ?>"></div>
                    <div><label for="movieType">Genre</label><input type="text" name="type" id="movieType" value="<?= $movie['type']; ?>"></div>
                </div>
                <div class="movie-form_group">
                    <div><label for="movieSenarist">Sénariste</label><input type="text" name="senarist" id="movieSenarist" value="<?= $movie['senarist']; ?>"></div>
                    <div><label for="movieProductors">Producteurs</label><input type="text" name="producer" id="movieProductors" value="<?= $movie['producer']; ?>"></div>
                </div>
                <div class="movie-form_group">
                    <div><label for="movieReleaseDate">Année de sortie</label><input type="number" min="1800" name="releasedate" id="movieReleaseDate" value="<?= $movie['releasedate']; ?>"></div>
                </div>
                <div class="movie-form_group movie-form_submit"><input type="submit" value="Modifier"></div>
            </form>
        </div>
    </main>
</body>

</html>