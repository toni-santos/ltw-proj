<?php

declare(strict_types=1);
?>

<?php function restaurant_card(int $id)
{ ?>
    <div id="restaurant-card-<?php echo $id; ?>">
        <img src="images/placeholder.jpg" class="rest-img">
        <section class="restaurant-description">
            <h3>Restaurant Name <?php echo $id; ?></h3>
            <ul>
                <li>g1</li>
                <li>g2</li>
                <li>g3</li>
            </ul>
        </section>
    </div>
<?php } ?>

<?php function restaurant_preview(bool $active, int $id)
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
        <section class="promo promo-user">
            <img src="images/placeholder.jpg" id="promo-img">
            <section class="promo-desc">
                <h4 class="low-header">Start ordering!</h4>
                <p>ordering ordering ordering ordering ordering ordering ordering</p>
                <a href="#">Register</a>
            </section>
        </section>
        <section class="promo promo-restaurant">
            <img src="images/placeholder.jpg" id="promo-img">
            <section class="promo-desc">
                <h4 class="low-header">Get your business out there!</h4>
                <p>selling selling selling selling selling selling selling selling</p>
                <a href="#">Register</a>
            </section>
        </section>
        <!-- If we eventually implement driver accounts we should add a promo here! -->
    </section>
<?php } ?>