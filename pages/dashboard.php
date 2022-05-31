<?php
session_start();

require_once('../templates/commons.php');
require_once('../templates/dashboard.tpl.php');

drawTop(["dashboard", "commons"], []);
drawNavbar();
?>