<?php
session_start();

require_once('templates/commons.php');
require_once('templates/index.tpl.php');


drawTop(["index", "commons"], ["hamburger", "scrollsnap"]);
?>
<div class="main-top">
    <div class="top-text">
        <a class="h6 dark-bg" id="top-desc">
            Welcome to (not) UberEats, this is definitely NOT UberEats, and we definitely DO NOT specialize in food delivery, bringing you food from your favourite restaurants.
            <br>
            Find your favorite restaurant right now!
        </a>
        <form id="search-container" autocomplete="off" method="GET">
            <input class="search shadow-nohov" type="search body1" name="s" id="restaurant-search" placeholder="Search">
            <button class="material-icons button">search</button>
        </form>
    </div>
    <img src="images/placeholder_bg.jpg" id="top-background">
</div>
<div class="main-bottom">
    <h2 class="h5">Our top picks</h2>
    <?php
    drawCarousel();
    promos();
    ?>
</div>
<?php
drawFooter();
?>