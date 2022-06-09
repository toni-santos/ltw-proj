<?php
declare(strict_types=1);
session_start();

require_once('../templates/commons.php');
require_once('../templates/profile.tpl.php');
require_once('../templates/user_profile.tpl.php');
require_once('../templates/search.tpl.php');
	
require_once('../database/db_loader.php');
require_once('../php/user.php');

drawTop(["commons", "forms"], ["hamburger", "resizer", "favorite"]);
?>

<div id="not-found-container">
    <img src="../images/page_not_found.png" id="not-found-image">
    <p id="not-found-text" class="h4">Page Not Found!</p>
</div>

<?php  

drawFooter();
?>