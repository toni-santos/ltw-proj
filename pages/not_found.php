<?php
declare(strict_types=1);
session_start(['cookies_samesite' => 'Lax']);

require_once('../templates/commons.php');
require_once('../templates/profile.tpl.php');
require_once('../templates/user_profile.tpl.php');
require_once('../templates/search.tpl.php');
	
require_once('../database/db_loader.php');
require_once('../php/user.php');

drawTop(["commons", "forms"], ["hamburger", "resizer", "favorite", "commons"]);
?>
<?php
if (!empty($_SESSION['messages'])) {
    $cnt = 0;
    foreach ($_SESSION['messages'] as $message) {
        drawMessage($message, $cnt);
        $cnt++;
        $_SESSION['messages'] = array_merge(array_diff($_SESSION['messages'], array($message)));
    }
}?>
<div id="not-found-container">
    <img alt="Not found" src="../images/page_not_found.png" id="not-found-image">
    <p id="not-found-text" class="h4">Page Not Found!</p>
</div>

<?php  

drawFooter();
?>