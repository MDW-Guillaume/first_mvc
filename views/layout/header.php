<header>
    <nav>
        <ul>
            <li class="header-logo"><a href="/"><img src="assets/img/logo.png">
                    <h1>The Circle</h1>
                </a></li>
            <?php if ($_SESSION['user_id']) : ?>
                <li class="header-actions">
                    <div class="search-container">
                        <form action="/?action=search" method="post">
                            <input type="search" id="searchBar" name="search" placeholder="Rechercher un film...">
                            <button type="submit"><img class="search-icon" src="assets/img/search.png"></button>
                        </form>
                    </div>
                    <div class="dropdown">
                        <span>user</span>
                        <div class="dropdown-content">
                            <span><?= $_SESSION['username'] ?></span>
                            <hr>
                            <a class="dropdown-child" href="/?action=movie/add">Ajouter un film</a>
                            <a href="/?action=user/logout" class="dropdown-child">Deconnexion</a>
                        </div>
                    </div>
                </li>
            <?php else : ?>
                <li class="header-actions">
                    <a href="/?action=user/login" class="landing-actions">Se connecter</a>
                    <a href="/?action=user/signin" class="landing-actions">S'inscrire</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>