<?php
declare(strict_types=1);
session_start();

require_once('../templates/commons.php');
require_once('../templates/search.tpl.php');

drawTop(["search", "commons"], ["hamburger"]);
?>
<form id="search-container" autocomplete="off" method="GET">
    <input class="search shadow-nohov" type="search body1" name="s" id="restaurant-search" placeholder="Search">
    <button class="material-icons button">search</button>
</form>
<?php 
if (isset($_SESSION['id'])) { ?>
    <p class="h6 search-header">Favourite Restaurants</p>
    <section class="grid-wrapper">
        <?php
        for ($i = 0; $i < 15; $i++)
            searchCards();
        ?>    
    </section>
<?php } ?>
<p class="h6 search-header">Restaurants</p>
<section class="grid-wrapper">
    <?php
    for ($i = 0; $i < 15; $i++)
        searchCards();
    ?>    
</section>
<p class="h6 search-header">Dishes</p>
<section class="grid-wrapper">
    <?php
    for ($i = 0; $i < 15; $i++)
        searchCards();
    ?>    
</section>
<p class="h6 search-header">Users</p>
<section class="grid-wrapper">
    <?php
    for ($i = 0; $i < 15; $i++)
        searchCards();
    ?>    
</section>
<?php
drawFooter();
?>