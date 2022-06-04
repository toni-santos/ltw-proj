<?php
session_start();

require_once('../templates/commons.php');
require_once('../templates/search.tpl.php');
require_once('../templates/checkout.tpl.php');

drawTop(["commons", "forms", "checkout"], ["hamburger", "forms"]);
?>
<p id="main-top" class="h5">My Cart</p>
<div id="payment-wrapper">
    <section id="items-wrapper">
        <?php
            for ($i = 0; $i < 10; $i++) {
                cartItem();
            }
        ?>
    </section>
    <aside id="payment-info">
        <p class="h6" id="payment-header">Payment Method</p>
        <input type="radio" name="inperson"></input>
        <label for="inperson" class="subtitle2 dark-bg">In Person</label>
        <input type="radio" name="online"></input>
        <label for="online" class="subtitle2 dark-bg">Online</label>
        <p class="h6">Description</p>
        money here
        <button>Submit</button>
    </aside>
</div>
<?php
drawFooter();
?>