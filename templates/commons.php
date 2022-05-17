<?php
declare(strict_types = 1);
?>

<?php function drawTop(array $styles, array $scripts) { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>(not) UberEats</title>
        <?php 
            foreach ($styles as $style) {
                ?><link href="styles/<?php echo $style;?>.css" rel="stylesheet"><?php
            }
        ?>
        <?php 
            foreach ($scripts as $script) {
                ?><script type="text/javascript" src="scripts/<?php echo $script;?>.js" defer></script><?php
            }
        ?>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body style="overflow: scroll;">
        <?php 
            drawNavbar();
        ?>
        <main>
<?php }?>

<?php function drawNavbar() { ?>
    <header class="nav">
        <ul class="nav" id="nav-left">
            <li><a ><span onclick="window.location.href = 'index.php';" class="material-icons">fastfood</span></a></li>
            <li><a href="restaurants.php">Restaurants</a></li>
            <li><a href="about.php">About Us</a></li>
        </ul>
        <ul class="nav" id="nav-right">
            <li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign-Up</a></li>
        </ul>
    </header>
    <header class="nav-hamburger">
        <a id="logo"><span onclick="window.location.href = 'index.php';" class="material-icons">fastfood</span></a>
        <a id="hamburger-icon" ><span onclick="showHamburger()" id="hamburger-icon-menu" class="material-icons">menu</span></a>
    </header>
    <div id="hamburger-content" style="display: none;">
        <div id="hamburger-top">
            <a href="restaurants.php">Restaurants</a>
            <a href="about.php">About Us</a>            
        </div>
        <div id="hamburger-bottom">
            <a href="login.php">Login</a>
            <a href="signup.php">Register</a>
        </div>
    </div>
<?php }?>

<?php function drawFooter() { ?>
    </main>    
    <footer>
        <section class="links">
            <ul>
                <li><a>Home</a></li>
                <li><a>Restaurants</a></li>
                <li><a>About Us</a></li>
            </ul>
        </section>
        <section class="contacts">
            <ul>
                <li>PhoneNumber</li>
                <li>Email</li>
                <li>Address</li>
            </ul>
        </section>
        <section class="socials">
            <a>
                <img src="./images/twitter.svg" width="24px">
                @(not)UberEats
            </a>
            <a>
                <img src="./images/facebook.svg" width="24px">
                @(not)UberEats
            </a>
            <a>
                <img src="./images/instagram.svg" width="24px">
                @(not)UberEats
            </a>
        </section>
    </footer>
</body>
</html>
<?php }?>