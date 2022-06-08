<?php
declare(strict_types=1);
session_start();

require_once('../templates/commons.php');
require_once('../templates/profile.tpl.php');
require_once('../templates/user_profile.tpl.php');
require_once('../templates/search.tpl.php');
	
require_once('../database/db_loader.php');
require_once('../php/user.php');

if (isset($_SESSION['id'])) {
    $db = getDatabase();
    $user = User::getUser($db, $_SESSION['id']);
} else {
}
// TODO: pass information of profile being visited through GET and get user here

drawTop(["commons", "forms", "profile", "search"], ["hamburger", "scrollsnap", "resizer", "forms", "favorite"]);
profileTop();
if (isset($_SESSION['id'])) {
    profileBottom(["my information", "my reviews", "favorite restaurants", "favorite dishes"], 600, $user);
} else {
    profileBottom(["reviews", "favorite restaurants", "favorite dishes"], 600, $user);
}
drawFooter();
?>