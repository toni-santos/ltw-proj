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

$db = getDatabase();
if (empty($_GET)) {
    $restaurants = Restaurant::getAllRestaurants($db);
    $dishes = Dish::getAllDishes($db);
    $users = User::getAllUsers($db);
} else {
    if (!empty($_GET['filters'])) {
        $filters = array_values(array_diff($_GET['filters'], array(null)));
        
        $restaurants = isset($_GET['r_filter']) ? Restaurant::searchRestaurants($db, htmlspecialchars($_GET['s']), $filters) : null;
        $dishes = isset($_GET['d_filter']) ? Dish::searchDishes($db, htmlspecialchars($_GET['s']), $filters) : null;
        $users = isset($_GET['u_filter']) ? User::searchUsers($db, htmlspecialchars($_GET['s'])) : null;
    }
}

foreach ($restaurants as $restaurant) {
    $restaurant->setRestaurantRating($db);
    $restaurant->getRestaurantCategories($db);
}

foreach ($dishes as $dish) {
    $dish->getAssociatedRestaurant($db);
}

if ($_GET['filters-order'] == 'an') {
    usort($dishes, function ($a, $b) {
        return $a->_name > $b->_name;
    });
    usort($restaurants, function ($a, $b) {
        return $a->name > $b->name;
    });
    usort($users, function ($a, $b) {
        return $a->username > $b->username;
    });
} else if ($_GET['filters-order'] == 'dn') {
    usort($dishes, function ($a, $b) {
        return $a->_name < $b->_name;
    });
    usort($restaurants, function ($a, $b) {
        return $a->name < $b->name;
    });
    usort($users, function ($a, $b) {
        return $a->username < $b->username;
    });
} else if ($_GET['filters-order'] == 'ar') {
    usort($restaurants, function ($a, $b) {
        return $a->rating > $b->rating;
    });
} else if ($_GET['filters-order'] == 'dr') {
    usort($restaurants, function ($a, $b) {
        return $a->rating < $b->rating;
    });
}


drawTop(["commons", "forms", "search"], ["hamburger", "forms", "search", "favorite"]);
?>

<form id="search-bar" action="" class="subtitle2" autocomplete="off" method="GET">
    <section id="search-container">
        <input class="search shadow-nohov body1" type="text" name="s" id="restaurant-search" placeholder="Search">
        <button class="material-icons button pointer">search</button>
    </section>
    <section id="filters">
        <fieldset class="shadow-nohov dark-bg">
            <div class="checkbox-wrapper">
                <label>
                    <input class="checkbox" type="checkbox" name="r_filter" 
                    <?php 
                    if (empty($_GET)){
                        echo "checked";
                    } else {
                        if (isset($_GET['r_filter'])){
                            echo "checked";
                        }
                    }
                    ?>></input><span class="checkbox-text pointer">Restaurants</span>
                </label>
            </div>
            <div class="checkbox-wrapper">
                <label>
                    <input class="checkbox" type="checkbox" name="d_filter" 
                    <?php 
                    if (empty($_GET)){
                        echo "checked";
                    } else {
                        if (isset($_GET['d_filter'])){
                            echo "checked";
                        }
                    }
                    ?>></input><span class="checkbox-text pointer">Dishes</span>
                </label>
            </div>
            <div class="checkbox-wrapper">
                <label>
                    <input class="checkbox" type="checkbox" name="u_filter" 
                    <?php 
                    if (empty($_GET)){
                        echo "checked";
                    } else {
                        if (isset($_GET['u_filter'])){
                            echo "checked";
                        }
                    }
                    ?>></input><span class="checkbox-text pointer">Users</span>
                </label>
            </div>
        </fieldset>
        <select id="filters-order" class="shadow-nohov pointer dark-bg" name="filters-order">
            <option <?php 
            if ($_GET['filters-order'] == 'an'){
                echo "selected";
            }
            ?> value="an">Ascending Name</option>
            <option <?php 
            if ($_GET['filters-order'] == 'dn'){
                echo "selected";
            }
            ?> value="dn">Descending Name</option>
            <option <?php 
            if ($_GET['filters-order'] == 'ar'){
                echo "selected";
            }
            ?> value="ar">Ascending Rating</option>
            <option <?php 
            if ($_GET['filters-order'] == 'dr'){
                echo "selected";
            }
            ?> value="dr">Descending Rating</option>
        </select>
    </section>
    <a id="show-more"><span class="material-icons pointer" onclick="showAdvanced(event)">expand_more</span></a>
    <section id="adv-filters">
        <?php 
        $db = getDatabase();
        $categories = getCategories($db);

        if (empty($_GET)) {
            foreach ($categories as $category) {
                checkboxButton($category, true);
            }
        } else {
            if (!empty($_GET['filters'])) {
                for ($i = 0; $i < count($categories); $i++) {
                    if (in_array($categories[$i], $_GET['filters'])) {
                        checkboxButton($categories[$i], true);
                    } else {
                        checkboxButton($categories[$i], false);
                    }
                }
            } else {
                foreach ($categories as $category) {
                    checkboxButton($category, false);
                }
            }
        }
        ?>
    </section>
</form>
<?php
if (!empty($restaurants)) { ?>
<p class="h5 search-header">Restaurants</p>
<section class="grid-wrapper">
    <?php
    foreach ($restaurants as $restaurant) {
        restaurantSearchCards($restaurant);
    }
    ?>    
</section>
<?php
}

if (!empty($dishes)) { ?>
<p class="h5 search-header">Dishes</p>
<section class="grid-wrapper">
    <?php
    foreach ($dishes as $dish) {
        dishSearchCards($dish, false, null);
    }
    ?>    
</section>
<?php
}

if (!empty($users)) { ?>
<p class="h5 search-header">Users</p>
<section class="grid-wrapper">
    <?php
    foreach ($users as $user) {
        userSearchCards($user);
    }
    ?>    
</section>
<?php
}

drawFooter();
?>