<?php
declare(strict_types=1);
session_start();

require_once('../templates/commons.php');
require_once('../templates/search.tpl.php');
require_once('../database/db_loader.php');
require_once('../php/categories.php');
require_once('../php/restaurant.php');
require_once('../php/user.php');
require_once('../php/dish.php');

drawTop(["commons", "forms", "search"], ["hamburger", "forms", "search", "favorite"]);

$db = getDatabase();

$restaurants = Restaurant::getRestaurants($db, 18);
$dishes = Dish::getDishes($db, 23);
$users = User::getUsers($db, 10);

?>

<form id="search-bar" action="../actions/search_action.php" class="subtitle2" autocomplete="off" method="GET">
    <section id="search-container">
        <input class="search shadow-nohov body1" type="text" name="s" id="restaurant-search" placeholder="Search">
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
        $db = getDatabase();
        $categories = getCategories($db);
        foreach ($categories as $category) {
            checkboxButton($category, true);
        }
        ?>
    </section>
</form>
<p class="h5 search-header">Restaurants</p>
<section class="grid-wrapper">
    <?php
        restaurantsSearchCards($restaurants);
    ?>    
</section>
<p class="h5 search-header">Dishes</p>
<section class="grid-wrapper">
    <?php
        dishSearchCards($dishes);
    ?>    
</section>
<p class="h5 search-header">Users</p>
<section class="grid-wrapper">
    <?php
        userSearchCards($users);
    ?>    
</section>
<?php
drawFooter();
?>