<?php
declare(strict_types = 1);
require_once('templates/commons.php');
require_once('templates/restaurants.tpl.php');

drawTop(["restaurants", "commons"], ["hamburger.js"]);
?>
<div class="search-box">
    <input id="restaurant-search" type="search">
</div>
<div id="results-container">
    <section id="search-results">
        <?php
            for ( $i = 0; $i < 15; $i++)
                searchCards();
        ?>
    </section>
</div>
<?php
drawFooter();
?>