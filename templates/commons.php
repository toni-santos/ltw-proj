<?php

declare(strict_types=1); ?>

<?php

require_once '../php/user.php';
require_once '../database/db_loader.php';

?>

<?php function drawLogin() { ?> 
    <form id="form-login" method="POST" action="../actions/login_action.php">
        <section id="inputs-box">
            <div class="input-container">
                <input class="text text-input subtitle2" type="email" name="email" autocomplete="email" placeholder=" " onkeyup="updateForm(event)" onfocus="checkFilled(event)" required>
                <label class="body2 dark-bg" for="email" onclick="setFocus(event)">Email</label>
                <span class="error subtitle2 transparent">Required</span>
            </div>
            <div class="input-container">
                <input class="text text-input password subtitle2" type="password" name="pwd" placeholder=" " autocomplete="current-password" minlength="8" onkeyup="updateForm(event)" onfocus="checkFilled(event)" required>
                <label class="body2 dark-bg" for="pwd" onclick="setFocus(event)">Password</label>
                <span class="material-icons md-24 md-light password-eye" onclick="showPassword(event)">visibility</span>
                <span class="error subtitle2 transparent">Required</span>
            </div>
        </section>
        <button id="confirm-login" class="button-form" type="submit" name="submit" disabled> Log In </button>
    </form>
<?php } ?>

<?php function drawSignup() { ?> 
    <form id="form-signup" method="POST" action="../actions/signup_action.php">
        <section id="inputs-box">
            <div class="input-container">
                <input class="text text-input subtitle2" type="text" name="name" autocomplete="off" placeholder=" " onkeyup="updateForm(event)" onfocus="checkFilled(event)" required>
                <label class="body2 dark-bg" for="name" onclick="setFocus(event)">Name</label>
                <span class="error subtitle2 transparent">Required</span>
            </div>
            <div class="input-container">
                <input class="text text-input subtitle2" type="email" name="email" autocomplete="email" placeholder=" " onkeyup="updateForm(event)" onfocus="checkFilled(event)" required>
                <label class="body2 dark-bg" for="email" onclick="setFocus(event)">Email</label>
                <span class="error subtitle2 transparent">Required</span>
            </div>
            <div class="input-container">
                <input class="text text-input password subtitle2" type="password" name="pwd" placeholder=" " autocomplete="current-password" minlength="8" onkeyup="updateForm(event); updateCounter(event)" onkeydown="updateCounter(event)" onfocus="checkFilled(event)" required>
                <label class="body2 dark-bg" for="pwd" onclick="setFocus(event)">Password</label>
                <span class="material-icons md-24 md-light password-eye" onclick="showPassword(event)">visibility</span>
                <span class="subtitle2 counter">0/8</span>
                <span class="error subtitle2 transparent">Required</span>
            </div>
            <div class="input-container">
                <input class="text text-input subtitle2" type="text" name="address" autocomplete="off" placeholder=" " onkeyup="updateForm(event)" onfocus="checkFilled(event)" required>
                <label class="body2 dark-bg" for="address" onclick="setFocus(event)">Address</label>
                <span class="error subtitle2 transparent">Required</span>
            </div>
            <div class="input-container">
                <input class="text text-input subtitle2" type="number" name="tel" autocomplete="off" placeholder=" " onkeyup="updateForm(event)" onfocus="checkFilled(event)" required>
                <label class="body2 dark-bg" for="tel" onclick="setFocus(event)">Phone Number</label>
                <span class="error subtitle2 transparent">Required</span>
            </div>
        </section>
        <!-- TODO: Add animation <section id="inputs-extra"></section> -->
        <button id="confirm-signup" class="button-form" type="submit" name="submit" value="Signup" disabled>Sign Up</button>
    </form>
<?php } ?>

<?php function drawTop(array $styles, array $scripts)
{ ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>(not) UberEats</title>
        <?php
        foreach ($styles as $style) {
        ?>
            <link href="../styles/<?php echo $style; ?>.css" rel="stylesheet">
        <?php } ?>
        <?php
        foreach ($scripts as $script) {
        ?>
            <script type="text/javascript" src="../scripts/<?php echo $script; ?>.js" defer></script>
        <?php } ?>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>

    <body style="overflow: scroll;">
    <?php drawNavbar(); ?>
    <main>
<?php } ?>

<?php function drawNavbar()
{ 
if (isset($_SESSION['id'])) {
    $db = getDatabase();
    global $user;
    $user = User::getUser($db, $_SESSION['id']);
} ?>
    <dialog id="dialog-login" class="shadow-nohov">
        <div id="top-form">
            <p class="h5">Login</p>
            <button value="cancel" class="blank-button" onclick="closeLogin()">
                <span class="material-icons">close</span>
            </button>
        </div>
        <?php drawLogin(); ?>
        <p class="body2 acc-create">Don't have an account? <a class="body1 pointer" onclick="closeLogin(); showSignup();">Sign-Up</a> now!</p>
    </dialog>
    <dialog id="dialog-signup" class="shadow-nohov">
        <div id="top-form">
            <p class="h5">Sign Up</p>
            <button value="cancel" class="blank-button" onclick="closeSignup()">
                <span class="material-icons">close</span>
            </button>
        </div>
        <?php drawSignup(); ?>
        <p class="body2 acc-create">Already have an account? <a class="body1 pointer" onclick="closeSignup(); showLogin();">Login</a> now!</p>
    </dialog>
    <header class="nav">
        <ul class="nav" id="nav-left">
            <li><a><span onclick="window.location.href = 'index.php';" class="material-icons">fastfood</span></a></li>
            <li><a class="subtitle1" href="search.php">Search</a></li>
        </ul>
        <ul class="nav" id="nav-right">
            <?php if (!isset($_SESSION['id'])) { ?>
            <li><a class="subtitle1" onclick="showLogin()">Login</a></li>
            <li><a class="subtitle1" onclick="showSignup()">Sign-Up</a></li>
            <?php } else { ?>
            <!-- TODO: search bar -->
            <li class="dropdown"><a class="subtitle1"><?php echo $user->username; ?></a></li>
            <li class="dropdown"><img class="nav-pfp" src="../images/placeholder.jpg"></li>
            <section id="dropdown-content">
                <a class="subtitle2" href="user_page.php">My Profile</a>
                <a class="subtitle2" href="dashboard.php">My Dashboard</a>
                <form action="../actions/logout_action.php" method="POST">
                    <button type="submit" class="blank-button subtitle2">
                        Logout
                    </button>
                </form>
            </section>
            <?php } ?>
        </ul>
    </header>
    <header class="nav-hamburger">
        <a id="hamburger-icon"><span onmousedown="showHamburger(event)" id="hamburger-icon-menu" class="material-icons">menu</span></a>
    </header>
    <div class="disappear" id="hamburger-content">
        <div id="hamburger-top">
            <div id="top-icons" onclick="window.location.href= 'index.php';">
                <span class="material-icons">fastfood</span>
                <a class="subtitle1">(not) UberEats</a>
            </div>
            <a class="subtitle1" href="search.php">Search</a>
        </div>
        <div id="hamburger-bottom">
            <?php if (!isset($_SESSION['id'])) { ?>
            <a class="subtitle1" href="login.php">Login</a>
            <a class="subtitle1" href="signup.php">Register</a>
            <?php } else { ?>
            <div id="user-bar">
                <div id="user-info">
                    <img class="nav-pfp" src="../images/placeholder.jpg" onclick="window.location.href = 'index.php';">
                    <a class="subtitle1" href="user_page.php"><?php echo $user->username; ?></a>
                </div>
                <form action="../actions/logout_action.php" method="POST">
                    <button type="submit" class="blank-button">
                        <span class="material-icons">logout</span>
                    </button>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<?php function drawFooter()
{ ?>
</main>
<footer>
    <section class="contacts">
        <ul>
            <li class="subtitle2">PhoneNumber</li>
            <li class="subtitle2">Email</li>
            <li class="subtitle2">Address</li>
        </ul>
    </section>
    <section class="socials">
        <a class="subtitle2">
            <img src="../images/twitter.svg" width="24px">
            @(not)UberEats
        </a>
        <a class="subtitle2">
            <img src="../images/facebook.svg" width="24px">
            @(not)UberEats
        </a>
        <a class="subtitle2">
            <img src="../images/instagram.svg" width="24px">
            @(not)UberEats
        </a>
    </section>
</footer>
</body>

</html>
<?php } ?>