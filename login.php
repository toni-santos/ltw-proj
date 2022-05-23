<?php
require_once('templates/commons.php');

drawTop(["restaurants", "commons", "forms"], ["hamburger", "forms"]);
?>

<section class="signup-form">
    <div id="box">
        <p class="h5">Login</p>
        <form id="form" action="/includes/login_action.php" method="POST">
            <section id="inputs-box">
                <div class="input-container">
                    <input class="text text-input subtitle2" type="email" name="email" autocomplete="email" placeholder=" " onkeyup="updateForm(event)" onfocus="checkFilled(event)" required>
                    <label class="body2 dark-bg" for="email" onclick="setFocus(event)">Email</label>
                    <span class="error subtitle2 transparent">Required</span>
                </div>
                <div class="input-container">
                    <input id="password" class="text text-input password subtitle2" type="password" name="pwd" placeholder=" " autocomplete="current-password" minlength="8" onkeyup="updateForm(event)" onfocus="checkFilled(event)" required>
                    <label class="body2 dark-bg" for="pwd" onclick="setFocus(event)">Password</label>
                    <span class="material-icons md-24 md-light password-eye" onclick="showPassword(event)">visibility</span>
                    <span class="error subtitle2 transparent">Required</span>
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
            <button class="button" type="submit" name="submit" disabled> Log In </button>
        </form>
        <p class="body2 acc-create">Don't have an account? <a class="body1" href="signup.php">Sign-Up</a> now!</p>
    </div>
</section>

<?php
drawFooter();
?>