<?php
declare(strict_types=1);
session_start();

require_once('../templates/commons.php');
require_once('../templates/profile.tpl.php');
require_once('../templates/restaurant_profile.tpl.php');
require_once('../templates/search.tpl.php');
require_once('../database/db_loader.php');
require_once('../php/restaurant.php');

$db = getDatabase();

if (!isset($_GET['id']) || intval($_GET['id']) <= 0) {
    http_response_code(404);
    require("not_found.php");
    die;
}


$restaurant = Restaurant::getRestaurant($db, intval($_GET['id']));
if (!isset($restaurant->restaurantID)) {
    http_response_code(404);
    require("not_found.php");
    die;
}

drawTop(["commons", "forms", "profile", "search"], ["hamburger", "scrollsnap", "resizer", "forms", "favorite", "review"]);
restaurantProfileTop($restaurant);
restaurantProfileBottom(["info", "menus", "reviews"], 600);
drawFooter();
?>