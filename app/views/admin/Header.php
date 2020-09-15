<header class="navbar-fixed">
    <nav class="grey darken-4" id="nav">
        <div class="nav-wrapper width-95">
            <a href="index.php" class="brand-logo"><i class="fas fa-book-open left"></i>IT-<span
                    class="orange-text text-accent-4">e</span>Books Admin Panel</a>
            <a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a class="hover-text-out hover-text-in" href="index.php?page=bookstore">Bookstore</a></li>
                <?php
                if (isset($_SESSION["user"])):
                    ?>
                    <li><a href="#" class="dropdown-trigger btn btn-floating waves-effect waves-light gray darken-4"
                           data-target="profile"><img src="public/img/small/<?= $_SESSION["user"]->avatarSmall ?>"
                                                      alt="avatar"></a>
                    </li>
                <?php endif; ?>
                <ul id="profile" class="dropdown-content">
                    <li><a href="index.php?page=profile">Profile</a></li>
                    <?php
                    if ($_SESSION["user"]->idRole == 1):
                        ?>
                        <li><a href="#!">Admin Panel</a></li>
                    <?php endif; ?>
                    <li class="divider" tabindex="-1"></li>
                    <li><a href="index.php?page=logout">Logout</a></li>
                </ul>
            </ul>
        </div>
    </nav>
</header>

