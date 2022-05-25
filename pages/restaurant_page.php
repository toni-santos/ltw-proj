<?php
session_start();
declare(strict_types=1);

require_once('../templates/commons.php');
require_once('../templates/profile.tpl.php');

drawTop(["commons", "profile"], ["hamburger", "scrollsnap"]);
profileTop();
profileBottom(["info", "menus", "reviews"], 300, Pages::Restaurant);
drawFooter();
?>