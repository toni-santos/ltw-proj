<?php 
declare(strict_types=1);

function cartItem($id){ ?>
    <div class="cart-item" id="cart-item-<?= $id; ?>">
        <div class="left-item">
            <img class="item-img" src="../images/placeholder.jpg">
            <section class="item-info">
                <p class="subtitle1">DISH NAME<?php echo $id;?></p>
                <p class="subtitle2">RESTAURANT NAME</p>
            </section>
        </div>
        <div class="right-item">
            <div class="right-item-top">
                <span class="material-icons md-light pointer" onclick="decreaseAmount(event)">chevron_left</span>
                <a class="subtitle2">1</a>
                <span class="material-icons md-light pointer" onclick="increaseAmount(event)">chevron_right</span>
                <p class="cost subtitle1">10€</p>
            </div>
            <p class="subtitle2 pointer" onclick="removeItem(event)">Remove</p>
        </div>
    </div>
<?php } ?>

<?php function itemPrice($id, $amnt) { ?>
    <div class="pay-desc-item subtitle2" id="item-desc-<?= $id; ?>">
        <a>food<?= $id; ?></a>
        <a><span>1</span>x 10€</a>
    </div>
<?php } ?>