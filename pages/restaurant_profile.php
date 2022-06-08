<?php
declare(strict_types=1);
session_start();

require_once('../templates/commons.php');
require_once('../templates/profile.tpl.php');
require_once('../templates/restaurant_profile.tpl.php');
require_once('../templates/search.tpl.php');

drawTop(["commons", "forms", "profile", "search"], ["hamburger", "scrollsnap", "resizer", "forms", "favorite", "review"]);
profileTop();
profileBottom(["info", "menus", "reviews"], 600);
drawFooter();
?>