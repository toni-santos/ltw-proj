<?php
declare(strict_types=1);
session_start();

require_once('../templates/commons.php');
require_once('../templates/profile.tpl.php');

drawTop(["commons", "forms", "profile"], ["hamburger", "scrollsnap", "resizer", "forms"]);
profileTop();
profileBottom(["info", "menus", "reviews"], 600, Pages::Restaurant);
drawFooter();
?>