<?php function drawTop() {?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>(not) UberEats</title>
        <link href="style.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body style="overflow: scroll;">
        <?php
            include('templates/navbar.php');
            drawNavbar();
        ?>
        <main>
<?php }?>

<?php function drawNavbar() { ?>
    <header class="nav">
        <ul class="nav" id="nav-left">
            <li><a ><span onclick="window.location.href = 'index.html';" class="material-icons">fastfood</span></a></li>
            <li><a href="restaurants.html">Restaurants</a></li>
            <li><a>About Us</a></li>
        </ul>
        <ul class="nav" id="nav-right">
            <li><a>Login</a></li>
            <li><a>Register</a></li>
        </ul>
    </header>
    <header class="nav-hamburger">
        <a id="logo"><span onclick="window.location.href = 'index.html';" class="material-icons">fastfood</span></a>
        <a id="hamburger-icon"><span id="hamburger-icon-menu" class="material-icons">menu</span></a>
    </header>
    <div id="hamburger-content" style="display: none;">
        <div id="hamburger-top">
            <a href="restaurants.html">Restaurants</a>
            <a>About Us</a>            
        </div>
        <div id="hamburger-bottom">
            <a>Login</a>
            <a>Register</a>
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
<?php }?>

<?php function drawBot() { 
    drawFooter(); ?>
    <script type="text/javascript">
        const hc = document.getElementById("hamburger-content");
        const hi = document.getElementById("hamburger-icon-menu");
        const hcul = document.getElementById("hcul");
        const body = document.getElementsByTagName("body")[0];
        hi.addEventListener("click", function() {
            if (hc.style.display == "none"){
                hc.style.display = "flex";
                body.style.overflow = "hidden";
            } else {
                hc.style.display = "none";
                body.style.overflow = "scroll";
            }
        }, false);
    </script>
    </body>
    </html>
<?php }?>