<?php
declare(strict_types=1);
session_start();

require_once('../templates/commons.php');
require_once('../templates/profile.tpl.php');
require_once('../templates/restaurant_profile.tpl.php');
require_once('../templates/checkout.tpl.php');
require_once('../templates/search.tpl.php');
require_once('../database/db_loader.php');
require_once('../php/restaurant.php');

$db = getDatabase();

if (!isset($_GET['id']) || intval($_GET['id']) <= 0) {
    http_response_code(404);
    require("not_found.php");
    die;
}

$is_owner = false;

$restaurant = Restaurant::getRestaurant($db, intval($_GET['id']));
$restaurant->setRestaurantRating($db);
$restaurant->getRestaurantOwner($db);
$restaurant->getRestaurantMenus($db);
$restaurant->getRestaurantReviews($db);
$restaurant->getRestaurantCategories($db);

if (!isset($restaurant->restaurantID)) {
    http_response_code(404);
    require("not_found.php");
    die;
}

if ($restaurant->ownerID == intval($_SESSION['id'])) {
    $is_owner = true;
}


drawTop(["commons", "forms", "profile", "search", "checkout"], ["hamburger", "scrollsnap", "resizer", "forms", "favorite", "review", "cart"]);
if ($is_owner) {
    restaurantEditDialog($restaurant);
    addDishDialog($restaurant);
}
if (isset($_SESSION['id']) && !$is_owner) {
    drawCheckoutDialog($db, $restaurant->restaurantID);
    drawFAB();
}
restaurantProfileTop($restaurant);
restaurantProfileBottom(["info", "menus", "reviews"], 600, $restaurant, $is_owner);
drawFooter();
?>