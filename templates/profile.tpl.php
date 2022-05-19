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
        <img id="banner" class="shadow-nohov" src="images/placeholder_bg.jpg">
        <div id="tabs-container">
            <div id="pfp" class="shadow-nohov"></div>
            <p class="h5">Name</p>
        </div>
    </div>
<?php }

function profileBottom(array $tabs, int $scrollVal, Pages $page)
{ ?>
    <div id="profile-bottom">
        <hr class="horizontal-divider solid">
        <div id="content-wrapper">
            <section id="tabs" class="h6">
                <?php for ($i = 0; $i < count($tabs); $i++) { ?>
                    <p class="shadow" id="tab-<?php echo $i; ?>" onclick="snapContent(event, <?php echo $scrollVal; ?>, 'bottom-content', 'vertical')"><?php echo $tabs[$i]; ?></p>
                <?php } ?>
            </section>
            <!-- TODO: figure out content formatting -->
            <?php

            switch ($page) {
                case Pages::RestaurantLogged:break;
                case Pages::Restaurant: ?>
                    <div id="bottom-content">
                        <section id="info">
                            <p id="description" class="body2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam explicabo neque laudantium, asperiores enim, rem architecto sint vel doloribus reiciendis ex, possimus animi ut iure! Atque quam provident saepe autem.
                            </p>
                            <p id="gallery">
                                <img src="images/placeholder.jpg" class="">
                                <img src="images/placeholder.jpg" class="">
                                <img src="images/placeholder.jpg" class="">
                            </p>
                            <a class="h5">Where to find us?</a>
                            <!-- geolocation here maybe? -->
                            <p class="body2">the location</p>
                        </section>
                        <section id="menus">

                        </section>
                        <section id="reviews">

                        </section>
                    </div>
                <?php break;
                case Pages::UserLogged: break;
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