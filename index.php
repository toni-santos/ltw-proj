<?php
require_once('templates/commons.php');
require_once('templates/index.tpl.php');

drawTop(["index", "commons"], ["hamburger", "carousel"]);
?>
<div class="main-top">
    <div class="top-text">
        <a id="top-desc">
            Welcome to (not) UberEats, this is definitely NOT UberEats, and we definitely DO NOT specialize in food delivery, bringing you food from your favourite restaurants.
        </a>
        <input type="search" name="restaurant-search" id="restaurant-search" placeholder="Search...">
    </div>
    <img src="images/placeholder_bg.jpg" id="top-background">
</div>
<div class="main-bottom">
    <h2>Our top picks</h2>
    <div class="carousel">
        <div id="spotlight-restaurant">
            <?php
            restaurant_card((int) 1);
            ?>
        </div>
        <div class="carousel-preview">
            <?php
            restaurant_preview(true, intval(1));

            for ($i = 2; $i < 4; $i++) {
                restaurant_preview(false, (int) $i);
            }
            ?>
        </div>
    </div>
    <?php promos(); ?>
</div>
<?php
drawFooter();
?>