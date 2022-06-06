<?php

declare(strict_types=1);

function searchCards()
{ ?>
    <div class="grid-card shadow">
        <section class="grid-card-overlay">
            <div class="sub-info">
                <div class="sub-info-top">
                    <p class="body1 dark-bg rest-name">Restaurant name</p>
                    <form method="POST" action=""> <!-- TODO: toggle favorite action -->
                        <span class="material-icons dark-bg" onclick="toggleFav(event)">favorite_border</span>
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
function restaurantSearchCards()
{ ?>
    <div class="grid-card shadow">
        <section class="grid-card-overlay">
            <div class="sub-info">
                <div class="sub-info-top">
                    <p class="body1 dark-bg rest-name">Restaurant name</p>
                    <form method="POST" action=""> <!-- TODO: toggle favorite action -->
                        <span class="material-icons dark-bg" onclick="toggleFav(event)">favorite_border</span>
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
function dishSearchCards()
{ ?>
    <div class="grid-card shadow">
        <section class="grid-card-overlay">
            <div class="sub-info">
                <div class="sub-info-top">
                    <p class="body1 dark-bg rest-name">Dish name</p>
                    <form method="POST" action=""> <!-- TODO: toggle favorite action -->
                        <span class="material-icons dark-bg" onclick="toggleFav(event)">favorite_border</span>
                    </form>
                </div>
                <div class="sub-info-bottom">
                    <p class="body2 dark-bg rating">10€</span></p>
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
function userSearchCards()
{ ?>
    <div class="grid-card shadow">
        <section class="grid-card-overlay">
            <div class="sub-info">
                <div class="sub-info-top">
                    <p class="body1 dark-bg rest-name">Restaurant name</p>
                </div>
            </div>
        </section>
    </div>
<?php } ?>