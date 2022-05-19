<?php

declare(strict_types=1);
?>

<?php function restaurant_card(int $id)
{ ?>
    <div id="restaurant-card-<?php echo $id; ?>">
        <img src="images/placeholder.jpg" class="rest-img shadow">
        <section class="restaurant-description">
            <h3 class="body1 rest-name">Restaurant Name <?php echo $id; ?></h3>
            <ul class="body2">
                <li>g1</li>
                <li>g2</li>
                <li>g3</li>
            </ul>
        </section>
    </div>
<?php } ?>

<?php function drawCarousel()
{ ?>
    <div class="carousel">
        <div id="carousel-container">
            <?php
            restaurant_card((int) 1);
            restaurant_card((int) 2);
            restaurant_card((int) 3);
            ?>
        </div>
        <div class="carousel-preview">
            <?php
            restaurantPreview(true, intval(0));
            restaurantPreview(false, intval(1));
            restaurantPreview(false, intval(2));
            ?>
        </div>
    </div>
<?php } ?>

<?php function restaurantPreview(bool $active, int $id)
{
    if ($active) { ?>
        <img src="images/placeholder.jpg" onclick="snapContent(event, 600, 'carousel-container', 'horizontal')" class="rest-preview active" id="rest-preview-<?php echo $id; ?>">
    <?php return;
    } else { ?>
        <img src="images/placeholder.jpg" onclick="snapContent(event, 600, 'carousel-container', 'horizontal')" class="rest-preview inactive" id="rest-preview-<?php echo $id; ?>">
    <?php } ?>
<?php } ?>

<?php function promos()
{ ?>
    <section class="signup-promo">
        <section class="promo promo-user shadow">
            <img src="images/placeholder.jpg" class="promo-img">
            <section class="promo-desc">
                <h4 class="body1">Start ordering!</h4>
                <p class="subtitle2">Get food from your favorite restaurants, simply create an account below!</p>
                <a href="#" class="subtitle1 register-promo">Register</a>
            </section>
        </section>
        <section class="promo promo-restaurant shadow">
            <img src="images/placeholder.jpg" class="promo-img">
            <section class="promo-desc">
                <h4 class="body1">Get your business out there!</h4>
                <p class="subtitle2">Create an account and start delivering food through our services!</p>
                <a href="#" class="subtitle1 register-promo">Register</a>
            </section>
        </section>
        <!-- If we eventually implement driver accounts we should add a promo here! -->
    </section>
<?php } ?>