<?php
require_once('templates/commons.php');

drawTop(["restaurants", "commons", "signup"], ["hamburger.js"]);


?>

<section class="signup-form">    
    <div id="box">
        <h2> Sign Up </h2>
        <form action="/includes/signup.inc.php" method="POST">
        <input id = "text" type="text" name="name" placeholder="Name"> 
        <input id = "text" type="text" name="email" placeholder="Email">
        <input id = "text" type="password" name="pwd" placeholder="Password"> 
        <input id = "text" type="password" name="pwd" placeholder="Repeat password"> 
        <?php
            //checking if the session 'success' is set. Success session is the message that the credetials are successfully saved.
            if(ISSET($_SESSION['success'])){
        ?>
        <!-- Display registration success message -->
        <div> 
            <?php 
            echo $_SESSION['success']
            ?> 
        </div>
        <?php
            //Unsetting the 'success' session after displaying the message. 
            unset($_SESSION['success']);
            }
        ?>
        <button id="button" type="submit" name="submit">  Sign Up  </button>
        </form>
        <p> Already have an account? <a href="login.php" > Login now!</a></p>
    </div>
</section>

<?php
    drawFooter();
?>