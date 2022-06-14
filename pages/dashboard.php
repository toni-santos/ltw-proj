<?php
session_start();

require_once('../templates/commons.php');
require_once('../templates/search.tpl.php');
require_once('../templates/dashboard.tpl.php');
require_once('../database/db_loader.php');

require_once('../php/user.php');

if (!isset($_SESSION['id'])) {
    http_response_code(404);
    require("not_found.php");
    die;
}

$db = getDatabase();
$restaurants = User::getUserRestaurants($db, intval($_SESSION['id']));
$user = User::getUser($db, $_SESSION['id']);
foreach ($restaurants as $restaurant) {
    $restaurant->setRestaurantRating($db);
}

drawTop(["commons", "forms", "search", "dashboard"], ["hamburger", "forms", "favorite"]);
drawRestaurantDialog();
?>

<div id="main-top">
    <p class="h5">My Restaurants</p>
    <span id="add-restaurant" class="pointer material-icons md-light" onclick="showRestaurantDialog()">add</span>
</div>
<section class="grid-wrapper">
    <?php
    if (!empty($restaurants)) {
        foreach ($restaurants as $restaurant) {
            restaurantSearchCards($restaurant);
        }
    } else { ?>
        <p class="user-no-restaurants subtitle1">You don't own a restaurant yet. :(</p><br>
        <p class="user-no-restaurants subtitle1">Create one in the "plus" icon above! :D</p>
    <?php } ?>
</section>
<?php

userRequestsTop();
?>
<section class="restaurant-req-wrapper">
<?php
$uorders = $user->getUserRequests($db);
if (!empty($uorders)) {
    foreach ($uorders as $request) {
        userRequest($request, $db);
    }     
} else { ?>
    <p class="restaurant-no-req subtitle1">You haven't ordered yet! :(</p>
<?php } ?>
</section>
<?php
foreach ($restaurants as $restaurant) {
    restaurantRequestsTop($restaurant);
    ?>
    <section class="restaurant-req-wrapper">
    <?php
    $requests = $restaurant->getRestaurantRequests($db);
    if (!empty($requests)) {
        foreach ($requests as $request) {
            restaurantRequest($request, $db);
        }
    } else { ?>
        <p class="restaurant-no-req subtitle1">There are no requests for this restaurant! :(</p>
    <?php } ?>
    </section>
<?php } ?>
<?php
drawFooter();
?>