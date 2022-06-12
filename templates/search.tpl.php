<?php

declare(strict_types=1);

function restaurantSearchCards(Restaurant $restaurant)
{ ?>
    <div class="grid-card shadow" style="background-image: url('../images/rest_images/rest<?= $restaurant->restaurantID;?>.jpg');">
        <section class="grid-card-overlay" onclick="window.location.href='../pages/restaurant_profile.php?id=<?= $restaurant->restaurantID; ?>'" >
            <div class="sub-info">
                <div class="sub-info-top" >
                    <p class="body1 dark-bg rest-name" ><?= $restaurant->name; ?></p>
                    <?php
                    if (isset($_SESSION['id'])) {
                    ?>
                    <form class="fav-rest-form" method="POST" action="">
                        <input type="hidden" name="fav_restaurant_id" value="<?= $restaurant->restaurantID; ?>"></input>
                        <button class="blank-button"><span class="material-icons dark-bg" onclick="toggleFavRest(event)"><?php
                        if ($restaurant->checkFavorite($_SESSION['id'])) {
                            echo "favorite";
                        } else {
                            echo "favorite_border";
                        }
                        ?></span></button>
                    </form>
                    <?php } ?>
                </div>
                <div class="sub-info-bottom">
                    <p class="body2 dark-bg rest-loc"><?= $restaurant->location; ?></p>
                    <p class="body2 dark-bg rating"><?php
                       echo $restaurant->rating ? $restaurant->rating: "N/A";
                    ?><span class="material-icons dark-bg">star</span></p>
                    <div class="genre-list body2">
                        <?php 
                        foreach ($restaurant->categories as $category) {?>
                            <a class="shadow-nohov"><?= $category; ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } ?>

<?php
function dishSearchCards(Dish $dish, bool $is_owner, ?int $restaurantID, bool $is_search)
{ ?>
<div class="grid-card shadow" style="background-image: url('../images/dish_images/dish<?= $dish->_dishID;?>.jpg');">
    <section class="grid-card-overlay">
        <div class="sub-info">
            <div class="sub-info-top">
                <p class="body1 dark-bg rest-name"><?= $dish->_name; ?></p>
                <?php
                    if (isset($_SESSION['id'])) {
                ?>
                <div class="fav-dish-form">
                    <input type="hidden" name="fav_dish_id" value="<?= $dish->_dishID; ?>"></input>
                    <button class="blank-button" onclick="event.preventDefault();"><span class="material-icons dark-bg" onclick="toggleFavDish(event)"><?php
                        if ($dish->checkFavorite($_SESSION['id'])) {
                            echo "favorite";
                        } else {
                            echo "favorite_border";
                        }
                        ?></span></button>
                </div>
                <?php } ?>
            </div>
            <div class="sub-info-bottom">
                <p class="body2 dark-bg"><?= $dish->_restaurant; ?></p>
                <div class="genre-list body2">
                    <a class="shadow-nohov"><?= $dish->_category; ?></a>
                </div>
                <?php 
                if (!$is_search) {
                    if (!$is_owner) { ?>
                        <form method="POST" action="">
                            <button class="body1 blank-button order" ><?= $dish->_price; ?>€ - Order</button>
                        </form>
                    <?php } else { ?>
                        <form method="POST" action="../actions/remove_dish_action.php">
                            <input type="hidden" name="dishID" value="<?= $dish->_dishID; ?>">
                            <input type="hidden" name="restaurantID" value="<?= $restaurantID; ?>">
                            <button class="body1 material-icons blank-button order delete-dish"><span>delete</span></button>
                        </form>
                    <?php } ?>
                <?php } else { ?>
                    <a class="subtitle2 order" onclick="window.location.href='../pages/restaurant_profile.php?id=<?= $dish->_restaurantID; ?>'">Visit restaurant</a>   
                <?php } ?>
            </div>
        </div>
    </section>
</div>
<?php } ?>

<?php
function userSearchCards(User $user)
{ ?>
    <div class="grid-card-nohov shadow" onclick="window.location.href='../pages/user_profile.php?id=<?= $user->userID; ?>'">
        <section class="grid-card-overlay">
            <div class="sub-info">
                <div class="sub-info-top">
                    <p class="body1 dark-bg rest-name"><?= $user->username; ?></p>
                </div>
            </section>
        </div>
<?php } ?>
