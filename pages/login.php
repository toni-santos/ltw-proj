<?php
session_start(['cookies_samesite' => 'Lax']);
require_once('../templates/commons.php');

drawTop(["search", "commons", "forms"], ["hamburger", "forms"]);
?>

<section class="signup-form">
    <div id="box">
        <p class="h5">Login</p>
        <?php drawLogin(); ?>
        <p class="body2 acc-create">Don't have an account? <a class="body1 highlight" href="signup.php">Sign-Up</a> now!</p>
    </div>
</section>

<?php
drawFooter();
?>