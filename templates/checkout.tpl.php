<?php 
declare(strict_types=1);

function cartItem(){ ?>
    <div class="cart-item">
        <div class="left-item">
            <img class="item-img" src="../images/placeholder.jpg">
            <section class="item-info">
                <p class="subtitle1">DISH NAME</p>
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