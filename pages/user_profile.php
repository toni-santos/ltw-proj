<?php
declare(strict_types=1);
session_start();

require_once('../templates/commons.php');
require_once('../templates/profile.tpl.php');
require_once('../templates/user_profile.tpl.php');
require_once('../templates/search.tpl.php');
	
require_once('../database/db_loader.php');
require_once('../php/user.php');

$db = getDatabase();

if (!isset($_GET['id']) || intval($_GET['id']) <= 0) {
    http_response_code(404);
    require("not_found.php");
    die;
}
$user = User::getUser($db, intval($_GET['id']));
$user->getUserReviews($db);
$user->getFavoriteDishes($db);

foreach ($user->favDishes as $dish) {
    $dish->getAssociatedRestaurant($db);
}

$user->getFavoriteRestaurants($db);

if (isset($_SESSION['id']) && $_SESSION['id'] == $_GET['id']) {
    $is_user = true;
} else {
    if ($user->userID) {
        $is_user = false;
    } else {
        http_response_code(404);
        require("not_found.php");
        die;
    }
}
drawTop(["commons", "forms", "profile", "search"], ["hamburger", "scrollsnap", "resizer", "forms", "favorite", "images"]);
userProfileTop($user, $is_user);
echo "asfhkadsfkad";
if ($is_user) {
    userProfileBottom(["my information", "my reviews", "favorite restaurants", "favorite dishes"], 600, $user, $is_user);
} else {
    userProfileBottom(["reviews", "favorite restaurants", "favorite dishes"], 600, $user, $is_user);
}
drawFooter();
?>