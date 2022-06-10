<?php
session_start();

require_once('../templates/commons.php');
require_once('../templates/search.tpl.php');

require_once('../database/db_loader.php');
require_once('../php/user.php');

if (!isset($_SESSION['id'])) {
    http_response_code(404);
    require("not_found.php");
    die;
}

$db = getDatabase();
$restaurants = User::getUserRestaurants($db, intval($_SESSION['id']));

foreach ($restaurants as $restaurant) {
    $restaurant->setRestaurantRating($db);
}

drawTop(["commons", "forms", "search", "dashboard"], ["hamburger", "forms"]);
drawRestaurantDialog();
?>

<div id="main-top">
    <p class="h5">My Restaurants</p>
    <span id="add-restaurant" class="pointer material-icons md-light" onclick="showRestaurantDialog()">add</span>
</div>
<section class="grid-wrapper">
    <?php
    foreach ($restaurants as $restaurant) {
        restaurantSearchCards($restaurant);
    }
    ?>
</section>
<?php
drawFooter();
?>