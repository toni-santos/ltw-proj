<?php
session_start(['cookies_samesite' => 'Lax']);
require_once('../templates/commons.php');

drawTop(["search", "commons", "forms"], ["hamburger", "forms", "commons"]);


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