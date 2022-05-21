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
        <div id="content-wrapper">
            <section id="tabs" class="h6">
                <p class="current-tab" id="tab-0" onclick="snapContent(event, <?php echo $scrollVal; ?>, 'bottom-content', 'vertical')"><?php echo $tabs[0]; ?></p>
                <?php for ($i = 1; $i < count($tabs); $i++) { ?>
                    <p class="" id="tab-<?php echo $i; ?>" onclick="snapContent(event, <?php echo $scrollVal; ?>, 'bottom-content', 'vertical')"><?php echo $tabs[$i]; ?></p>
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
                            <div>
                                <p class="h6">Gallery</p>
                            </div>
                            <p id="gallery">
                                <img src="images/placeholder.jpg" class="">
                                <img src="images/placeholder.jpg" class="">
                                <img src="images/placeholder.jpg" class="">
                            </p>
                            <div>
                                <p class="h6">Where to find us</p>
                            </div>
                            <!-- geolocation here maybe? -->
                            <div id="maps"></div>
                        </section>
                        <section id="menus">
                            <p class="h6">Our menus</p>
                            <div class="grid-wrapper" id="menu-wrapper">
                                <section class="grid-organizer">
                                    <article class="grid-card">
                                    
                                    </article>
                                    <article class="grid-card">
                                    
                                    </article>                                        
                                    <article class="grid-card">
                                    
                                    </article>                                        
                                </section>
                            </div>
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