<?php

declare(strict_types=1);

require_once('../php/order.php');
require_once('../php/dish.php');

function cartItem(Dish $dish, Order $order, int $id)
{ ?>
    <article class="cart-item" id="cart-item-<?= $id; ?>">
        <div class="left-item">
            <img alt="Item picture" class="item-img" src="../images/placeholder.jpg">
            <section class="item-info">
                <p class="subtitle1"><?= $dish->_name?></p>
            </section>
        </div>
        <div class="right-item">
            <div class="right-item-top">
                <input type="hidden" class="cartItemDishID" name="cartItemDishID" value="<?=$dish->_dishID?>">
                <span class="material-icons md-light pointer" onclick="decreaseAmount(event, <?=$id?>)">chevron_left</span>
                <a class="subtitle2"><?= $order->amount?></a>
                <span class="material-icons md-light pointer" onclick="increaseAmount(event, <?=$id?>)">chevron_right</span>
                <p class="cost subtitle1"><?= $dish->_price?>€</p>
            </div>
            <input type="hidden" class="cartItemDishID" name="cartItemDishID" value="<?=$dish->_dishID?>">
            <p class="subtitle2 pointer" onclick="removeItem(event, <?=$id?>)">Remove</p>
        </div>
    </article>
<?php } ?>

<?php function itemPrice(Dish $dish, Order $order, int $id)
{ ?>
    <article class="pay-desc-item subtitle2" id="item-desc-<?= $id; ?>">
        <a><?= $dish->_name; ?></a>
        <a><span><?= $order->amount; ?></span>x <?= $dish->_price?>€</a>
    </article>
<?php } ?>

<?php function drawCheckoutDialog(PDO $db, int $restaurantID)
{ ?>
    <dialog id="dialog-checkout">
        <div class="top-form">
            <p class="h5">Checkout</p>
            <button value="cancel" class="blank-button" onclick="closeCheckout()">
                <span class="material-icons">close</span>
            </button>
        </div>
        <form method="POST" action="../actions/checkout_action.php">
            <div id="payment-wrapper">
                <section id="items-wrapper">
                    <?php
                    $i = 0;
                    foreach ($_SESSION['orders'] as $order) {
                        $order = Order::getOrderByDish($db, intval($order));
                        if ($order->restaurantID == $restaurantID) {
                            $dish = Dish::getDish($db, $order->dishID);
                            cartItem($dish, $order, $i);
                            $i++;
                        }
                    }
                    ?>
                </section>
                <aside id="payment-info">
                    <div id="payment-description">
                        <?php
                        $i = 0;
                        foreach ($_SESSION['orders'] as $order) {
                            $order = Order::getOrderByDish($db, intval($order));
                            if ($order->restaurantID == $restaurantID) {
                                $dish = Dish::getDish($db, $order->dishID);
                                itemPrice($dish, $order, $i);
                                $i++;
                            }
                        }
                        ?>
                    </div>
                    <div id="payment-method">
                        <p class="h6 payment-header">Payment Method</p>
                        <label for="inperson" class="subtitle2 dark-bg"><input type="radio" name="payment-method" id="inperson" value="inperson" checked>In Person</label>
                        <label for="online" class="subtitle2 dark-bg"><input type="radio" name="payment-method" id="online" value="online" disabled>Online (Coming Soon)</label>
                        <a class="subtitle1" id="cart-total">0€</a>
                        <input type="hidden" id="postvalue" name="val" value="0">
                        <input type="hidden" name="restID" value="<?=$restaurantID?>">
                        <button type="submit" class="subtitle1 shadow pointer" id="confirm-cart">Confirm</button>
                    </div>
                </aside>
            </div>
        </form>
    </dialog>
<?php } ?>