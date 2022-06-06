<?php
declare(strict_types=1);
session_start();

require_once('../templates/commons.php');
require_once('../templates/search.tpl.php');

drawTop(["search", "commons", "forms"], ["hamburger", "forms", "search", "favorite"]);
?>
<form id="search-bar" action="../actions/search_action.php" class="subtitle2" autocomplete="off" method="GET">
    <section id="search-container">
        <input class="search shadow-nohov body1" type="search" name="s" id="restaurant-search" placeholder="Search">
        <button class="material-icons button pointer">search</button>
    </section>
    <section id="filters">
        <fieldset class="shadow-nohov">
            <div class="checkbox-wrapper">
                <label>
                    <input class="checkbox" type="checkbox" name="r_filter" checked></input><span class="checkbox-text pointer">Restaurants</span>
                </label>
            </div>
            <div class="checkbox-wrapper">
                <label>
                    <input class="checkbox" type="checkbox" name="d_filter" checked></input><span class="checkbox-text pointer">Dishes</span>
                </label>
            </div>
            <div class="checkbox-wrapper">
                <label>
                    <input class="checkbox" type="checkbox" name="u_filter" checked></input><span class="checkbox-text pointer">Users</span>
                </label>
            </div>
        </fieldset>
        <select id="filters-order" class="shadow-nohov pointer" name="filters-order">
            <option value="an">Ascending Name</option>
            <option value="dn">Descending Name</option>
            <option value="ar">Ascending Rating</option>
            <option value="dr">Descending Rating</option>
        </select>
    </section>
    <a id="show-more"><span class="material-icons pointer" onclick="showAdvanced(event)">expand_more</span></a>
    <section id="adv-filters">
        <?php 
        for ($i = 0; $i < 1; $i++) {
            checkboxButton("Vegan");
            checkboxButton("BBQ");
            checkboxButton("American");
        }
        ?>
    </section>
</form>
<?php 
if (isset($_SESSION['id'])) { ?>
<p class="h5 search-header">Favourite Restaurants</p>
<section class="grid-wrapper">
    <?php
    for ($i = 0; $i < 15; $i++)
        restaurantSearchCards();
    ?>    
</section>
<?php } ?>
<p class="h5 search-header">Restaurants</p>
<section class="grid-wrapper">
    <?php
    for ($i = 0; $i < 15; $i++)
        restaurantSearchCards();
    ?>    
</section>
<p class="h5 search-header">Dishes</p>
<section class="grid-wrapper">
    <?php
    for ($i = 0; $i < 15; $i++)
        dishSearchCards();
    ?>    
</section>
<p class="h5 search-header">Users</p>
<section class="grid-wrapper">
    <?php
    for ($i = 0; $i < 15; $i++)
        userSearchCards();
    ?>    
</section>
<?php
drawFooter();
?>