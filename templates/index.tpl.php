<?php
declare(strict_types=1);
?>

<?php function restaurant_card(Restaurant $restaurant)
{ ?>
    <div id="restaurant-card-<?= $restaurant->restaurantID; ?>" class="shadow-nohov">
        <img src="../images/placeholder.jpg" class="rest-img shadow">
        <section class="restaurant-description">
            <h3 class="body1 rest-name"><?= $restaurant->name; ?></h3>
            <div class="body2 rating dark-bg shadow-nohov">
                <?= $restaurant->rating; ?><span class="material-icons">star</span>
            </div>
            <div class="genre-list body2">
                <a class="shadow-nohov">Genre</a>
                <a class="shadow-nohov">Genre</a>
                <a class="shadow-nohov">Genre</a>
            </div>
        </section>
    </div>
<?php } ?>

<?php function drawCarousel(array $restaurants)
{ ?>
    <div class="carousel">
        <div id="carousel-container">
            <?php
            for ($i = 0; $i < 3; $i++) {
                restaurant_card($restaurants[$i]);
            }
            ?>
        </div>
        <div class="carousel-preview">
            <img src="../images/placeholder.jpg" onclick="snapContent(event, 0, 'carousel-container', 'horizontal')" class="rest-preview active" id="rest-preview-<?= $restaurants[0]->restaurantID; ?>">
            <?php
            for ($i = 1; $i <= 2; $i++) {
                restaurantPreview(false, intval($restaurants[$i]->restaurantID));
            }
            ?>
        </div>
    </div>
<?php } ?>

<?php function restaurantPreview(bool $active, int $id)
{
    if ($active) { ?>
        <img src="../images/placeholder.jpg" onclick="snapContent(event, 500, 'carousel-container', 'horizontal')" class="rest-preview active" id="rest-preview-<?php echo $id; ?>">
    <?php 
    } else { ?>
        <img src="../images/placeholder.jpg" onclick="snapContent(event, 500, 'carousel-container', 'horizontal')" class="rest-preview inactive" id="rest-preview-<?php echo $id; ?>">
    <?php } ?>
<?php } ?>

<?php function promos()
{ ?>
    <section class="signup-promo">
        <section class="promo promo-user shadow">
            <img src="../images/promo_2.jpg" class="promo-img">
            <section class="promo-desc">
                <h4 class="body1">Start ordering!</h4>
                <p class="subtitle2">Get food from your favorite restaurants, simply create an account below!</p>
                <a class="subtitle1 register-promo pointer" onclick="showSignup()">Register</a>
            </section>
        </section>
    </section>
<?php } ?>

<?php function promosUser() { ?>
    <section class="signup-promo">
        <section class="promo promo-restaurant shadow">
            <img src="../images/promo_1.jpg" class="promo-img">
            <section class="promo-desc">
                <h4 class="body1">Get your business out there!</h4>
                <p class="subtitle2">Are you a restaurant owner looking to start your business on food delivery?</p>
                <a class="subtitle1 register-promo" onclick="showRestaurantDialog()">Register</a>
            </section>
        </section>
    </section>
<?php } ?>
