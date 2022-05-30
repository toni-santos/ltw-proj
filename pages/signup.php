<?php
session_start();
require_once('../templates/commons.php');

drawTop(["search", "commons", "forms"], ["hamburger", "forms"]);


?>

<section class="signup-form">
    <div id="box">
        <p class="h5">Sign Up</p>
        <?php drawSignup(); ?>
        <p class="body2 acc-create">Already have an account? <a class="body1" href="login.php">Login</a> now!</p>
    </div>
</section>

<?php
drawFooter();
?>