<?php
require_once('templates/commons.php');

drawTop(["restaurants", "commons", "signup"], ["hamburger.js"]);
?>

<section class="signup-form">
    <div id="box">
        <h2> Login </h2>
        <form action="login.inc.php" method="POST">
        <input id = "text"  type="text" name="name" placeholder="Username/Email"> 
        <input id = "text" type="password" name="pwd" placeholder="Password"> 
        <?php
            //checking if the session 'error' is set
            if(ISSET($_SESSION['error'])){
        ?>
        <!-- Display Login Error message -->
            <div><?php echo $_SESSION['error']?></div>
        <?php
            //Unsetting the 'error' session after displaying the message. 
            session_unset($_SESSION['error']);
            }
        ?>
        <button id="button" type="submit" name="submit"> Log In </button>
        </form>
        <p>Don't have an account? <a href="signup.php" > Sign-Up now!</a></p>
    </div>
</section>


<?php
    drawFooter();
?>