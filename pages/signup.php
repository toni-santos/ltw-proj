<?php
session_start(['cookies_samesite' => 'Lax']);
require_once('../templates/commons.php');

drawTop(["search", "commons", "forms"], ["hamburger", "forms"]);


?>

<section class="signup-form">
    <div id="box">
        <p class="h5">Sign Up</p>
        <?php drawSignup(); ?>
        <p class="body2 acc-create">Already have an account? <a class="body1 highlight" href="login.php">Login</a> now!</p>
    </div>
</section>

<?php
drawFooter();
?>