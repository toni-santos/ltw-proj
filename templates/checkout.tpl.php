<?php 
declare(strict_types=1);

function cartItem($id){ ?>
    <div class="cart-item">
        <div class="left-item">
            <img class="item-img" src="../images/placeholder.jpg">
            <section class="item-info">
                <p class="subtitle1">DISH NAME<?php echo $id;?></p>
                <p class="subtitle2">RESTAURANT NAME</p>
            </section>
        </div>
        <div class="right-item">
            <div class="right-item-top">
                <span class="material-icons md-light">chevron_left</span>
                <input type="number" class="amount" min="1" max="100"></input>
                <span class="material-icons md-light">chevron_right</span>
                <p class="cost" class="subtitle1">10€</p>
            </div>
            <p class="subtitle2">Remove</p>
        </div>
    </div>
<?php } ?>

<?php function itemPrice($id, $amnt) { ?>
    <div class="pay-desc-item subtitle2">
        <a>food<?php echo $id;?></a>
        <a><?php echo $amnt;?>x 10€</a>
    </div>
<?php } ?>