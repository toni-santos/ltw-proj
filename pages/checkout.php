<?php
session_start();

require_once('../templates/commons.php');
require_once('../templates/search.tpl.php');
require_once('../templates/checkout.tpl.php');

drawTop(["commons", "forms", "checkout"], ["hamburger", "forms", "cart"]);
?>
<p id="main-top" class="h5">My Cart</p>
<div id="payment-wrapper">
    <section id="items-wrapper">
        <?php
        for ($i = 0; $i < 4; $i++) {
            cartItem($i);
        }
        ?>
    </section>
    <aside id="payment-info">
        <div id="payment-description">
        <?php
        for ($i = 0; $i < 4; $i++) {
            itemPrice($i, intval(1));
        }
        ?>
        </div>
        <div id="payment-method">
            <p class="h6 payment-header">Payment Method</p>
            <label for="inperson" class="subtitle2 dark-bg"><input type="radio" name="payment-method" id="inperson" value="inperson" checked></input>In Person</label>
            <label for="online" class="subtitle2 dark-bg"><input type="radio" name="payment-method" id="online" value="online" disabled></input>Online (Coming Soon)</label>
            <a class="subtitle1" id="cart-total">0€</a>
            <button class="subtitle1 shadow" id="confirm-cart">Confirm</button>
        </div>
    </aside>
</div>
<?php
drawFooter();
?>