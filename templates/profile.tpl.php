<?php

declare(strict_types=1);

enum Pages
{
    case RestaurantLogged;
    case Restaurant;
    case UserLogged;
    case User;
}

function profileTop()
{ ?>
    <div id="profile-top">
        <img id="banner" class="shadow-nohov" src="../images/placeholder_bg.jpg">
        <div id="tabs-container">
            <div id="pfp" class="shadow-nohov"></div>
            <p class="h5">Name</p>
        </div>
    </div>
<?php }

function profileBottom(array $tabs, int $scrollVal, Pages $page)
{ ?>
    <div id="profile-bottom">
        <div id="content-wrapper">
            <section id="tabs" class="h6">
                <p class="current-tab" id="tab-0" onclick="snapContent(event, <?php echo $scrollVal; ?>, 'bottom-content', 'vertical')"><?php echo $tabs[0]; ?></p>
                <?php for ($i = 1; $i < count($tabs); $i++) { ?>
                    <p class="" id="tab-<?php echo $i; ?>" onclick="snapContent(event, <?php echo $scrollVal; ?>, 'bottom-content', 'vertical')"><?php echo $tabs[$i]; ?></p>
                <?php } ?>
            </section>
            <!-- TODO: fix mobile and resizer -->
            <?php

            switch ($page) {
                case Pages::RestaurantLogged:
                    break;
                case Pages::Restaurant: ?>
                    <div id="bottom-content">
                        <section id="info">
                            <p id="description" class="body2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam explicabo neque laudantium, asperiores enim, rem architecto sint vel doloribus reiciendis ex, possimus animi ut iure! Atque quam provident saepe autem.
                            </p>
                            <div>
                                <p class="h6">Gallery</p>
                            </div>
                            <p id="gallery">
                                <img src="../images/placeholder.jpg" class="">
                                <img src="../images/placeholder.jpg" class="">
                                <img src="../images/placeholder.jpg" class="">
                            </p>
                            <div>
                                <p class="h6">Where to find us</p>
                            </div>
                            <!-- geolocation here -->
                            <div id="maps"></div>
                        </section>
                        <section id="menus">
                            <p class="h6">Our menus</p>
                            <div class="grid-wrapper">
                                <?php
                                for ($i = 0; $i < 10; $i++)
                                    menuCards();
                                ?>
                            </div>
                        </section>
                        <section id="reviews">
                            <p class="h6">Reviews</p>
                            <?php
                            reviewBox();
                            for ($i = 0; $i < 10; $i++)
                                drawReview();
                            ?>
                        </section>

                    </div>
                <?php break;
                case Pages::UserLogged:
                    break;
                case Pages::User: ?>
                    <div id="bottom-content">
                        <section id="info">

                        </section>
                        <section id="menus">

                        </section>
                        <section id="reviews">

                        </section>
                    </div>
            <?php break;
            } ?>
        </div>
    </div>
<?php } ?>

<?php function menuCards()
{ ?>
    <section class="grid-card" id="menu-card">
        <article class="grid-card-overlay">
            <p class="body1 dark-bg">Menu</p>
            <div class="sub-info">
                <p class="subtitle2 dark-bg">Description</p>
            </div>
        </article>
    </section>
<?php } ?>

<?php function reviewBox()
{ ?>
    <form method="POST">
        <div class="textarea-container">
            <textarea placeholder=" " class="subtitle2 textbox" name="content" rows="3" cols="100"></textarea>
            <label class="body2" for="email">Review</label>
        </div>
        <div id="stars-button-container">
            <div class="star-container">
                <span class="material-icons star star-selected">
                    star_outline
                </span>
                <span class="material-icons star star-selected">
                    star_outline
                </span>
                <span class="material-icons star star-selected">
                    star_outline
                </span>
                <span class="material-icons star">
                    star_outline
                </span>
                <span class="material-icons star">
                    star_outline
                </span>
            </div>
            <button class="button review-button">CLICK</button>
        </div>
    </form>
<?php } ?>

<?php function drawReview()
{ ?>
    <section class="review">
        <div class="review-head">
            <div class="reviewer-info">
                <img src="../images/placeholder.jpg" class="reviewer-pfp">
                <p class="reviewer-name subtitle1">NAME</p>
            </div>
            <p class="reviewer-score subtitle1">X/5 <span class="material-icons">star</span></p>
        </div>
        <article class="subtitle2">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam explicabo neque laudantium, asperiores enim, rem architecto sint vel doloribus reiciendis ex, possimus animi ut iure! Atque quam provident saepe autem.
        </article>
    </section>
<?php } ?>