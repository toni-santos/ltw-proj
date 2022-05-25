<?php
session_start();

declare(strict_types=1);
require_once('templates/commons.php');
require_once('templates/restaurants.tpl.php');

drawTop(["restaurants", "commons"], ["hamburger"]);
?>
<form id="search-container" autocomplete="off" method="GET">
    <input class="search shadow-nohov" type="search body1" name="s" id="restaurant-search" placeholder="Search">
    <button class="material-icons button">search</button>
</form>
<section class="grid-wrapper">
    <?php
    for ($i = 0; $i < 15; $i++)
        searchCards();
    ?>
</section>
<?php
drawFooter();
?>