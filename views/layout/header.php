<header>
        <nav>
            <ul>
                <li><a href="/">Logo</a></li>
                <li>
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
            </ul>
        </nav>
    </header>