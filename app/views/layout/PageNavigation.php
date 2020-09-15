<body>
<header class="navbar-fixed">
    <nav class="grey darken-4" id="nav">
        <div class="nav-wrapper container">
            <a href="index.php" class="brand-logo"><i class="fas fa-book-open left"></i>IT-<span class="orange-text text-accent-4">e</span>Books</a>
            <a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a class="hover-text-out hover-text-in" href="index.php?page=bookstore">Bookstore</a>
                </li>
                <li>
                    <a class="hover-text-out hover-text-in" href="index.php?page=contact">Contact</a>
                </li>
                <li>
                    <a href="index.php?page=cart" class="orange-text text-accent-4"><i class="material-icons">shopping_cart</i></a>
                </li>
                <?php
                    if (!isset($_SESSION["user"])):
                ?>
                <li>
                    <a href="#registration" class="waves-effect waves-light modal-trigger btn orange accent-4">Sign In</a>
                </li>
                <?php endif; ?>
                <?php
                    if (isset($_SESSION["user"])):
                ?>
                <li>
                    <a href="#" class="dropdown-trigger btn btn-floating waves-effect waves-light gray darken-4" data-target="profile"><img src="public/img/small/<?= $_SESSION["user"]->avatarSmall ?>" alt="avatar"></a>
                </li>
                <?php endif; ?>
                <ul id="profile" class="dropdown-content">
                    <li><a href="index.php?page=profile">Profile</a></li>
                    <?php
                        if ($_SESSION["user"]->idRole == 1):
                    ?>
                        <li><a href="admin.php?page=dashboard">Admin Panel</a></li>
                    <?php endif; ?>
                    <li class="divider" tabindex="-1"></li>
                    <li><a href="index.php?page=logout">Logout</a></li>
                </ul>
            </ul>
        </div>
    </nav>
    <!-- Sign In Modal   -->
    <div id="registration" class="modal">
        <div class="modal-content" id="signin">
            <h4>Sign in</h4>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="siUsername" type="text" class="">
                            <label for="siUsername">First Name</label>
                            <span class="helper-text" data-error="Required"></span>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="siPassword" type="password" class="">
                            <label for="siPassword">Password</label>
                            <span class="helper-text" data-error="Required"></span>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light orange accent-4 right" type="button" id="siSend"
                            value="send">
                        Log In
                    </button>
                </form>
            </div>
            <div class="divider"></div>
            <a href="#" class="link-center" id="newacc">Create new account</a>
        </div>
        <!--  Sign Up Modal  -->
        <div class="modal-content" id="signup">
            <h4>Sign Up</h4>
            <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="suUsername" type="text" class="">
                            <label for="suUsername">Username</label>
                            <span class="helper-text" data-error="Required, max 13, min 3 characters"
                                  data-success="Correct">Max 13, min 3 characters</span>
                        </div>
                        <div class="input-field col s6">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="suPassword" type="password" class="">
                            <label for="suPassword">Password</label>
                            <span class="helper-text"
                                  data-error="Required, at least:1 big letter, 1 small letter, 1 number, min 8 character long"
                                  data-success="Correct">At least:1 big letter, 1 small letter, 1 number, min 8 character long</span>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="suEmail" type="text" class="">
                            <label for="suEmail">Email</label>
                            <span class="helper-text" data-error="Required"
                                  data-success="Correct">example@example.com</span>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light orange accent-4 right" type="button" id="suSend"
                            value="send">
                        Sign Up
                    </button>
                </form>
            </div>
            <div class="divider"></div>
            <a href="#" class="link-center" id="back1">Back to Sign In page</a>
        </div>
    </div>
</header>
<!--  Hamburger Menu -->
<ul class="sidenav" id="mobile-menu">
    <li><a href="index.php?page=bookstore">Bookstore</a></li>
    <li><a href="index.php?page=cart">Cart</a></li>
    <?php
    if (!isset($_SESSION["user"])):
        ?>
        <li><a href="#registration" class="modal-trigger">Login</a></li>
    <?php endif; ?>
    <?php
    if (isset($_SESSION["user"])):
        ?>
        <li><a href="index.php?page=logout">Logout</a></li>
    <?php endif; ?>
</ul>

