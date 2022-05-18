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
        <section id="tabs" class="h6">
            <?php for ($i = 0; $i < count($tabs); $i++) { ?>
                <p class="shadow" id="tab-<?php echo $i; ?>" onclick="snapContent(event, <?php echo $scrollVal; ?>)"><?php echo $tabs[$i]; ?></p>
            <?php } ?>
        </section>
        <hr class="horizontal-divider solid">
        <!-- TODO: figure out content formatting -->
        <?php 
        
        switch ($page) {
            case Pages::RestaurantLogged:?>
                <?php break;
            case Pages::Restaurant:?>
                <div id="bottom-content">
                    <section id="info">
        
                    </section>
                    <section id="menus">
        
                    </section>
                    <section id="reviews">
        
                    </section>
                </div>
                <?php break;
            case Pages::UserLogged: ?>
                <?php break;
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
        }
        
        ?>
    </div>
<?php } ?>