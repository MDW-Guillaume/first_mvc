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
            <a href="/?action=movie/add">+ Ajouter un film</a>
        </div>
        <h2>Mes films</h2>
        <?php if ($my_movies) { ?>
            <div class="movie-container">
                <table class="movie-table">
                    <tr>
                        <th>Titre</th>
                        <th>Type</th>
                        <th>Synopsis</th>
                        <th>Réalisateur</th>
                        <th>Année</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($my_movies as $my_movie) { ?>
                        <tr class="movie-element">
                            <td><?= $my_movie['title'] ?></td>
                            <td><?= $my_movie['type'] ?></td>
                            <td><?= $my_movie['synopsis'] ?></td>
                            <td><?= $my_movie['director'] ?></td>
                            <td><?= $my_movie['releasedate'] ?></td>
                            <td>
                                <a href="/?action=movie/show/<?= $my_movie['id']; ?>" class="movie-element__action">Voir</a>
                                <a href="/?action=movie/edit/<?= $my_movie['id']; ?>" class="movie-element__action">Modifier</a>
                                <a href="/?action=movie/delete/<?= $my_movie['id']; ?>" class="movie-element__action">Supprimer</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } else { ?>
            <a href="/?action=movie/add">Ajouter un film</a>
            <p>Vous n'avez aucun film. Ajouter en un dès maintenant !</p>
        <?php } ?>

        <h2>Tous les films</h2>
        <?php if ($movies) { ?>
            <div class="movie-container">
                <table class="movie-table">
                    <tr>
                        <th>Titre</th>
                        <th>Type</th>
                        <th>Synopsis</th>
                        <th>Réalisateur</th>
                        <th>Année</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($movies as $movie) { ?>
                        <tr class="movie-element">
                            <td><?= $movie['title'] ?></td>
                            <td><?= $movie['type'] ?></td>
                            <td><?= $movie['synopsis'] ?></td>
                            <td><?= $movie['director'] ?></td>
                            <td><?= $movie['releasedate'] ?></td>
                            <!-- if $user_id is mine -->
                            <?php if ($movie['user_id'] === $_SESSION['user_id']) { ?>
                                <td><a href="/?action=movie/edit/<?= $movie['id']; ?>" class="movie-element__action">Modifier</a></td>
                            <?php } else { ?>
                                <td><a href="/?action=movie/show/<?= $movie['id']; ?>" class="movie-element__action">Voir</a></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } else { ?>
            <a href="/?action=movie/add">Ajouter un film</a>
            <p>il n'existe aucun film sur cette plateforme. Ajouter en un dès maintenant !</p>
        <?php } ?>
    </main>
</body>

</html>