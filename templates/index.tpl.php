<?php

declare(strict_types=1);
?>

<?php function restaurant_card(int $id)
{ ?>
    <div id="restaurant-card-<?php echo $id; ?>">
        <img src="images/placeholder.jpg" class="rest-img">
        <section class="restaurant-description">
            <h3 class="body1">Restaurant Name <?php echo $id; ?></h3>
            <ul class="body2">
                <li>g1</li>
                <li>g2</li>
                <li>g3</li>
            </ul>
        </section>
    </div>
<?php } ?>

<?php function restaurantPreview(bool $active, int $id)
{
    if ($active) { ?>
        <img src="images/placeholder.jpg" onclick="changePick(event)" class="rest-preview active" id="rest-preview-<?php echo $id; ?>">
    <?php return;
    } else { ?>
        <img src="images/placeholder.jpg" onclick="changePick(event)" class="rest-preview inactive" id="rest-preview-<?php echo $id; ?>">
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