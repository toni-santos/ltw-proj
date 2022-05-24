<?php
require_once('templates/commons.php');

drawTop(["restaurants", "commons", "forms"], ["hamburger", "forms"]);


?>

<section class="signup-form">
    <div id="box">
        <p class="h5">Sign Up</p>
        <form id="form" action="/includes/signup_action.php" method="POST">
            <div>
                <?php
                if(isset($Error) && $Error != "")
                    echo $Error;
                ?>
            </div>
            <section id="inputs-box">
                <div class="input-container">
                    <input class="text text-input subtitle2" type="text" name="name" autocomplete="off" placeholder=" " onkeyup="updateForm(event)" onfocus="checkFilled(event)" required>
                    <label class="body2 dark-bg" for="name" onclick="setFocus(event)">Name</label>
                    <span class="error subtitle2 transparent">Required</span>
                </div>
                <div class="input-container">
                    <input class="text text-input subtitle2" type="email" name="email" autocomplete="email" placeholder=" " onkeyup="updateForm(event)" onfocus="checkFilled(event)" required>
                    <label class="body2 dark-bg" for="email" onclick="setFocus(event)">Email</label>
                    <span class="error subtitle2 transparent">Required</span>
                </div>
                <div class="input-container">
                    <input id="password" class="text text-input password subtitle2" type="password" name="pwd" placeholder=" " autocomplete="current-password" minlength="8" onkeyup="updateForm(event); updateCounter(event)" onkeydown="updateCounter(event)" onfocus="checkFilled(event)" required>
                    <label class="body2 dark-bg" for="pwd" onclick="setFocus(event)">Password</label>
                    <span class="material-icons md-24 md-light password-eye" onclick="showPassword(event)">visibility</span>
                    <span class="subtitle2 counter">0/8</span>
                    <span class="error subtitle2 transparent">Required</span>
                </div>
            </section>
            <button class="button" type="submit" name="submit" value="Signup" disabled>Sign Up</button>

        </form>
        <p class="body2 acc-create">Already have an account? <a class="body1" href="login.php">Login</a> now!</p>
    </div>
</section>

<?php
drawFooter();
?>