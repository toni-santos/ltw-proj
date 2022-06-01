<?php

declare(strict_types=1);

enum Pages
{
    case RestaurantLogged;
    case Restaurant;
    case UserLogged;
    case User;
} ?>

<?php
function drawFAB() { ?>
    <div id="fab-wrapper" class="shadow-nohov">
        <span class="material-icons" id="fab" onclick="showUserEdit()">edit</span>
    </div>
<?php } ?>

<?php
function profileTop()
{ 
if (isset($_SESSION['id'])) {
    $db = getDatabase();
    global $user;
    $user = User::getUser($db, $_SESSION['id']);
    drawFAB();
    userEditDialog();
}  ?>
    <div id="profile-top">
        <img id="banner" class="shadow-nohov" src="../images/placeholder_bg.jpg">
        <div id="tabs-container">
            <img id="pfp" class="shadow-nohov" src="../images/placeholder.jpg"></img>
            <?php if (isset($_SESSION['id'])) { ?>
                <p class="h5"><?php echo $user->username; ?></p>
            <?php } else { ?>
                <p class="h5">name</p>
            <?php }?>
        </div>
    </div>
<?php } ?>

<?php function profileBottom(array $tabs, int $scrollVal, Pages $page)
{ 
    if (isset($_SESSION['id'])) {
        $db = getDatabase();
        global $user;
        $user = User::getUser($db, $_SESSION['id']);
    }  
    ?>
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
                case Pages::Restaurant: ?>
                    <div id="bottom-content">
                        <section id="info">
                            <p id="description" class="body2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam explicabo neque laudantium, asperiores enim, rem architecto sint vel doloribus reiciendis ex, possimus animi ut iure! Atque quam provident saepe autem.
                            </p>
                            <div>
                                <p class="h6">Gallery</p>
                            </div>
                            <section id="gallery">
                                <img src="../images/placeholder.jpg" class="">
                                <img src="../images/placeholder.jpg" class="">
                                <img src="../images/placeholder.jpg" class="">
                            </section>
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
                case Pages::UserLogged: ?>
                    <div id="bottom-content">
                        <section id="info">
                            <div>
                                <p class="h6">Personal Information</p>
                            </div>
                            <div id="personal-info-wrapper" class="shadow-nohov">
                                <div class="personal-info">
                                    <span class="material-icons md-48">person</span>
                                    <p class="body1">Username</p>
                                    <p class="body2"><?php echo $user->username; ?></p>
                                </div>
                                <div class="personal-info">
                                    <span class="material-icons md-48">email</span>
                                    <p class="body1">Email</p>
                                    <p class="body2"><?php echo $user->email; ?></p>
                                </div>
                                <div class="personal-info">
                                    <span class="material-icons md-48">home</span>
                                    <p class="body1">Address</p>
                                    <p class="body2"><?php echo $user->address; ?></p>
                                </div>
                                <div class="personal-info">
                                    <span class="material-icons md-48">phone</span>
                                    <p class="body1">Phone Number</p>
                                    <p class="body2"><?php echo $user->phoneNum; ?></p>
                                </div>
                            </div>
                            <div>
                                <p class="h6">Recent Restaurants</p>
                            </div>
                            <div id="recent-restaurants">
                                <?php
                                    for ($i = 0; $i < 3; $i++) {
                                        searchCards();
                                    }
                                ?>
                            </div>
                        </section>
                        <section id="reviews">
                                <p class="h6">My Reviews</p>
                                <?php
                                for ($i = 0; $i < 10; $i++)
                                    drawReview();
                                ?>
                        </section>
                    </div>
                <?php break;
                case Pages::User: ?>
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
                        <section id="reviews">
                                <p class="h6">Reviews</p>
                                <?php
                                for ($i = 0; $i < 10; $i++)
                                    drawReview();
                                ?>
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
            <button class="button review-button">Review</button>
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

<?php function userEditDialog() { ?>
    <dialog id="dialog-user-edit">
        <div id="top-form">
            <p class="h5">Edit Profile</p>
            <button value="cancel" class="blank-button" onclick="closeUserEdit()">
                <span class="material-icons">close</span>
            </button>
        </div>
        <form method="POST">
            <section id="inputs-box">
                <div class="input-container">
                    <input class="text text-input subtitle2" type="text" name="name" autocomplete="off" placeholder=" ">
                    <label class="body2 dark-bg" for="name" onclick="setFocus(event)">Name</label>
                </div>
                <div class="input-container">
                    <input class="text text-input subtitle2" type="email" name="email" autocomplete="email" placeholder=" ">
                    <label class="body2 dark-bg" for="email" onclick="setFocus(event)">Email</label>
                </div>
                <div class="input-container">
                    <input class="text text-input subtitle2" type="text" name="address" autocomplete="off" placeholder=" ">
                    <label class="body2 dark-bg" for="address" onclick="setFocus(event)">Address</label>
                </div>
                <div class="input-container">
                    <input class="text text-input subtitle2" type="number" name="tel" autocomplete="off" placeholder=" ">
                    <label class="body2 dark-bg" for="tel" onclick="setFocus(event)">Phone Number</label>
                </div>
                <div class="input-container">
                    <input class="text text-input password subtitle2" type="password" name="pwd" placeholder=" " autocomplete="off" minlength="8">
                    <label class="body2 dark-bg" for="pwd" onclick="setFocus(event)">Password</label>
                    <span class="material-icons md-24 md-light password-eye" onclick="showPassword(event)">visibility</span>
                </div>
            </section>
            <button id="confirm-edit" class="button-form" type="submit" name="submit"> Edit </button>
        </form>
    </dialog>
<?php } ?>

<?php function restaurantEditDialog() { ?>
    <!-- TODO: Figure out necessary info for a restaurant -->
    <dialog id="restaurant-edit-dialog">
        <div id="top-form">
            <p class="h5">Edit Restaurant</p>
            <button value="cancel" class="blank-button" onclick="closeRestaurantEdit()">
                <span class="material-icons">close</span>
            </button>
        </div>
    </dialog>
<?php } ?>