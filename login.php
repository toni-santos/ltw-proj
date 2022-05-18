<?php
require_once('templates/commons.php');

drawTop(["restaurants", "commons", "login"], ["hamburger"]);
?>

<section class="signup-form">
    <div id="box">
        <p class="h5">Login</p>
        <form action="/includes/login.inc.php" method="POST">
            <div>
                <input class="text" type="text" name="email" placeholder="Email">
                <label for="email">Email</label>
                <span>Not a valid email address</span>
            </div>
            <div>
                <input class="text" type="password" name="pwd" placeholder="Password" autocomplete="current-password" minlength="8" required>
                <label for="email">Email</label>
                <span>Not a valid password</span>
            </div>
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