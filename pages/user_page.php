<?php
declare(strict_types=1);
session_start();

require_once('../templates/commons.php');
require_once('../templates/profile.tpl.php');
require_once('../templates/search.tpl.php');

drawTop(["commons", "forms", "profile", "search"], ["hamburger", "scrollsnap", "resizer", "forms"]);
profileTop();
profileBottom(["my information", "my reviews"], 600, Pages::UserLogged);
drawFooter();
?>