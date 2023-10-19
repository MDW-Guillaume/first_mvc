<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Ajouter un film</title>
</head>

<body>
    <?php include('views/layout/header.php'); ?>

    <main>
        <h2 class="title">Ajouter un film</h2>

        <div class="movie-contaier">
            <form action="/?action=movie/add" method="POST" class="movie-form">
                <div class="movie-form_group">
                    <div><label for="movieTitle">Titre</label><input type="text" name="title" id="movieTitle"></div>
                    <div><label for="movieDirector">Réalisateur</label><input type="text" name="director" id="movieDirector"></div>
                </div>
                <div class="movie-form_group">
                    <div><label for="movieSynopsis">Synopsis</label><input type="text" name="synopsis" id="movieSynopsis"></div>
                    <div><label for="movieType">Genre</label><input type="text" name="type" id="movieType"></div>
                </div>
                <div class="movie-form_group">
                    <div><label for="movieSenarist">Sénariste</label><input type="text" name="senarist" id="movieSenarist"></div>
                    <div><label for="movieProductors">Producteurs</label><input type="text" name="producer" id="movieProductors"></div>
                </div>
                <div class="movie-form_group">
                    <div><label for="movieReleaseDate">Année de sortie</label><input type="number" min="1800" name="releasedate" id="movieReleaseDate"></div>
                </div>
                <div class="movie-form_group movie-form_submit"><input type="submit" value="Ajouter"></div>
            </form>
        </div>
    </main>
</body>

</html>