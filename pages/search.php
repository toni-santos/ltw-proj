<?php
declare(strict_types=1);
session_start();

require_once('../templates/commons.php');
require_once('../templates/search.tpl.php');

drawTop(["search", "commons", "forms"], ["hamburger", "forms", "search"]);
?>
<form id="search-bar" class="subtitle2" autocomplete="off" method="GET">
    <section id="search-container">
        <input class="search shadow-nohov body1" type="search" name="s" id="restaurant-search" placeholder="Search">
        <button class="material-icons button">search</button>
    </section>
    <section id="filters">
        <fieldset class="shadow-nohov">
            <div class="checkbox-wrapper">
                <label>
                    <input class="checkbox" type="checkbox" name="a" checked></input><span class="checkbox-text">Restaurants</span>
                </label>
            </div>
            <div class="checkbox-wrapper">
                <label>
                    <input class="checkbox" type="checkbox" name="a" checked></input><span class="checkbox-text">Dishes</span>
                </label>
            </div>
            <div class="checkbox-wrapper">
                <label>
                    <input class="checkbox" type="checkbox" name="a" checked></input><span class="checkbox-text">Users</span>
                </label>
            </div>
        </fieldset>
        <select id="filters-order" class="shadow-nohov" name="filters-order">
            <option value="an">Ascending Name</option>
            <option value="dn">Descending Name</option>
            <option value="ar">Ascending Rating</option>
            <option value="dr">Descending Rating</option>
        </select>
    </section>
    <a id="show-more"><span class="material-icons" onclick="showAdvanced(event)">expand_more</span></a>
    <section id="adv-filters">
        <?php 
        for ($i = 0; $i < 10; $i++) {
            checkboxButton();
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
            searchCards();
        ?>    
    </section>
<?php } ?>
<p class="h5 search-header">Restaurants</p>
<section class="grid-wrapper">
    <?php
    for ($i = 0; $i < 15; $i++)
        searchCards();
    ?>    
</section>
<p class="h5 search-header">Dishes</p>
<section class="grid-wrapper">
    <?php
    for ($i = 0; $i < 15; $i++)
        searchCards();
    ?>    
</section>
<p class="h5 search-header">Users</p>
<section class="grid-wrapper">
    <?php
    for ($i = 0; $i < 15; $i++)
        searchCards();
    ?>    
</section>
<?php
drawFooter();
?>