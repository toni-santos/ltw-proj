<?php

declare(strict_types=1);

session_start();

require_once('../php/order.php');
require_once('../php/dish.php');

function cartItem(Dish $dish, Order $order)
{ ?>
    <div class="cart-item" id="cart-item-<?= $id; ?>">
        <div class="left-item">
            <img alt="Item picture" class="item-img" src="../images/placeholder.jpg">
            <section class="item-info">
                <p class="subtitle1"><?= $dish->_name?></p>
            </section>
        </div>
        <div class="right-item">
            <div class="right-item-top">
                <span class="material-icons md-light pointer" onclick="decreaseAmount(event)">chevron_left</span>
                <a class="subtitle2"><?= $order->amount?></a>
                <span class="material-icons md-light pointer" onclick="increaseAmount(event)">chevron_right</span>
                <p class="cost subtitle1"><?= $dish->_price?>€</p>
            </div>
            <p class="subtitle2 pointer" onclick="removeItem(event)">Remove</p>
        </div>
    </div>
<?php } ?>

<?php function itemPrice(Dish $dish, Order $order)
{ ?>
    <div class="pay-desc-item subtitle2" id="item-desc-<?= $id; ?>">
        <a><?= $dish->_name; ?></a>
        <a><span><?= $order->amount; ?></span>x <?= $dish->_price?>€</a>
    </div>
<?php } ?>

<?php function drawCheckoutDialog(PDO $db, int $restaurantID) // TODO: ORDERS (backend)
{ ?>
    <dialog id="dialog-checkout">
        <div id="top-form">
            <p class="h5">Checkout</p>
            <button value="cancel" class="blank-button" onclick="closeCheckout()">
                <span class="material-icons">close</span>
            </button>
        </div>
        <form method="POST" action="">
            <div id="payment-wrapper">
                <section id="items-wrapper">
                    <?php
                    foreach ($_SESSION['orders'] as $order) {
                        $order = Order::getOrderByDish($db, intval($order));
                        if ($order->restaurantID == $restaurantID) {
                            $dish = Dish::getDish($db, $order->dishID);
                            cartItem($dish, $order);
                        }
                    }
                    ?>
                </section>
                <aside id="payment-info">
                    <div id="payment-description">
                        <?php
                        foreach ($_SESSION['orders'] as $order) {
                            $order = Order::getOrderByDish($db, intval($order));
                            if ($order->restaurantID == $restaurantID) {
                                $dish = Dish::getDish($db, $order->dishID);
                                itemPrice($dish, $order);
                            }
                        }
                        ?>
                    </div>
                    <div id="payment-method">
                        <p class="h6 payment-header">Payment Method</p>
                        <label for="inperson" class="subtitle2 dark-bg"><input type="radio" name="payment-method" id="inperson" value="inperson" checked></input>In Person</label>
                        <label for="online" class="subtitle2 dark-bg"><input type="radio" name="payment-method" id="online" value="online" disabled></input>Online (Coming Soon)</label>
                        <a class="subtitle1" id="cart-total">0€</a>
                        <button type="submit" class="subtitle1 shadow" id="confirm-cart">Confirm</button>
                    </div>
                </aside>
            </div>
        </form>
    </dialog>
<?php } ?>