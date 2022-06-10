<?php

declare(strict_types=1);


function restaurantSearchCards()
{ ?>
    <div class="grid-card shadow">
        <section class="grid-card-overlay">
            <div class="sub-info">
                <div class="sub-info-top">
                    <p class="body1 dark-bg rest-name">Restaurant name</p>
                    <form class="fav-rest-form" method="POST" action=""> <!-- TODO: toggle favorite action -->
                        <input type="hidden" name="fav_restaurant_id" value="2"></input>
                        <button class="blank-button"><span class="material-icons dark-bg" onclick="toggleFavRest(event)">favorite_border</span></button>
                    </form>
                </div>
                <div class="sub-info-bottom">
                    <p class="body2 dark-bg rest-loc">location</p>
                    <p class="body2 dark-bg rating">4<span class="material-icons dark-bg">star</span></p>
                    <div class="genre-list body2">
                        <a class="shadow-nohov">Genre</a>
                        <a class="shadow-nohov">Genre</a>
                        <a class="shadow-nohov">Genre</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } ?>

<?php
function restaurantsSearchCards(array $restaurants) { ?>
    <?php foreach($restaurants as $restaurant) { ?> 
        <div class="grid-card shadow">
            <section class="grid-card-overlay">
                <div class="sub-info">
                    <div class="sub-info-top">
                        <a href="../pages/restaurant_profile.php?id=<?=$restaurant->restaurantID?>"><p class="body1 dark-bg rest-name"><?=$restaurant->name?></p></a>
                        <form class="fav-rest-form" method="POST" action=""> <!-- TODO: toggle favorite action -->
                            <input type="hidden" name="fav_restaurant_id" value="2"></input>
                            <button class="blank-button"><span class="material-icons dark-bg" onclick="toggleFavRest(event)">favorite_border</span></button>
                        </form>
                    </div>
                    <div class="sub-info-bottom">
                        <p class="body2 dark-bg rest-loc"><?=$restaurant->location?></p>
                        <p class="body2 dark-bg rating">4<span class="material-icons dark-bg">star</span></p>
                        <div class="genre-list body2">
                            <a class="shadow-nohov">Genre</a>
                            <a class="shadow-nohov">Genre</a>
                            <a class="shadow-nohov">Genre</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php } ?>
<?php } ?>

<?php
function dishSearchCards(array $dishes)
{ ?>
    <?php foreach($dishes as $dish) { ?>
        <div class="grid-card shadow">
            <section class="grid-card-overlay">
                <div class="sub-info">
                    <div class="sub-info-top">
                        <a href="../pages/restaurant_profile.php?id=<?=$dish->dishID?>"><p class="body1 dark-bg rest-name"><?=$dish->name?></p></a>
                        <form class="fav-dish-form" method="POST" action=""> <!-- TODO: toggle favorite action -->
                            <input type="hidden" name="fav_dish_id" value="2"></input>
                            <button class="blank-button"><span class="material-icons dark-bg" onclick="toggleFavDish(event)">favorite_border</span></button>
                        </form>
                    </div>
                    <div class="sub-info-bottom">
                        <p class="body2 dark-bg rating"><?=$dish->price?></span></p>
                        <div class="genre-list body2">
                            <a class="shadow-nohov"><?=$dish->category?></a>
                        </div>
                        <form method="POST" action="">
                            <button class="body1 blank-button order" >Order</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    <?php } ?>
<?php } ?>

<?php
function userSearchCards(array $users)
{ ?>
        <?php foreach($users as $user) { ?>
            <div class="grid-card-nohov shadow">
                <section class="grid-card-overlay">
                    <div class="sub-info">
                        <div class="sub-info-top">
                        <a href="../pages/user_profile.php?id=<?=$user->userID?>"><p class="body1 dark-bg rest-name"><?=$user->username?></p></a>
                        </div>
                    </div>
                </section>
            </div>
    <?php } ?>
<?php } ?>