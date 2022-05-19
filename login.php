<?php
require_once('templates/commons.php');

drawTop(["restaurants", "commons", "login"], ["hamburger"]);
?>

<section class="signup-form">
    <div id="box">
        <p class="h5">Login</p>
        <form action="/includes/login.inc.php" method="POST">
            <section id="inputs-box">
                <div class="input-container">
                    <input class="text text-input subtitle2" type="email" name="email" autocomplete="email" placeholder=" " required>
                    <label class="body2 dark-bg" for="email">Email</label>
                    <span class="error subtitle2">Required</span>
                </div>
                <div class="input-container">
                    <input class="text text-input subtitle2" type="password" name="pwd" placeholder=" " autocomplete="current-password" minlength="8" required>
                    <label class="body2 dark-bg" for="pwd">Password</label>
                    <span class="error subtitle2">Required</span>
                </div>
            </section>
            <?php
            //checking if the session 'error' is set
            if (isset($_SESSION['error'])) {
            ?>
                <!-- Display Login Error message -->
                <div><?php echo $_SESSION['error'] ?></div>
            <?php
                //Unsetting the 'error' session after displaying the message. 
                session_unset($_SESSION['error']);
            }
            ?>
            <button id="button" type="submit" name="submit"> Log In </button>
        </form>
        <p class="body2 acc-create">Don't have an account? <a class="body1" href="signup.php">Sign-Up</a> now!</p>
    </div>
</section>

<?php
drawFooter();
?>