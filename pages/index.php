<?php
session_start();

require_once('../templates/commons.php');
require_once('../templates/index.tpl.php');

drawTop(["index", "commons", "forms"], ["hamburger", "scrollsnap", "forms"]);
if (isset($_SESSION['id'])) {
    drawRestaurantDialog();
}
?>
<div class="main-top shadow-nohov">
    <div class="top-text">
        <a class="h6 dark-bg" id="top-desc">
            Welcome to (not) UberEats, this is definitely NOT UberEats, and we definitely DO NOT specialize in food delivery, bringing you food from your favorite restaurants.
            <br>
        </a>
        <a class="h6 dark-bg">Find your favorite restaurant right now!</a>
    </div>
    <img src="../images/index-bg.jpg" id="top-background">
</div>
<div class="main-bottom">
    <h2 class="h5">Our top picks</h2>
    <?php
    drawCarousel();
    if (isset($_SESSION['id'])) {
        promosUser();
    } else {
        promos();
    }
    ?>
</div>
<?php
drawFooter();
?>