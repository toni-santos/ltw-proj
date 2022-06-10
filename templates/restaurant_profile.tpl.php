<?php declare(strict_types=1); ?>

<?php function restaurantProfileTop(Restaurant $restaurant)
{ ?>
    <div id="profile-top">
        <div id="banner" class="shadow-nohov"></div>
        <div id="tabs-container">
            <img id="pfp" class="shadow-nohov" src="../images/rest_images/rest<?= $restaurant->restaurantID; ?>.jpg"></img>
            <p class="h5"><?= $restaurant->name; ?></p>
        </div>
    </div>
<?php } ?>

<?php function reviewBox(Restaurant $restaurant)
{ ?>
    <form method="POST" action="../actions/add_review_action.php">
        <div class="textarea-container">
            <textarea placeholder=" " class="subtitle2 textbox" name="message" rows="3" cols="100"></textarea>
            <label class="body2" for="email">Review</label>
        </div>
        <div id="stars-button-container">
            <div class="star-container">
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <input class="star input-star" type="radio" name="rating-star" id="star-<?= $i ?>" value="<?= $i+1 ?>" required>
                        <label id="star-label-<?= $i ?>" class="material-icons" onclick="selectStar(event)">
                            <span>star_outline</span>
                        </label>
                    </input>
                <?php } ?>
            </div>
            <input type="hidden" name="restaurantID" value="<?= $restaurant->restaurantID; ?>">
            <input type="hidden" name="reviewerID" value="<?= $_SESSION['id']; ?>">
            <button class="button review-button" type="submit" value="Submit">Review</button>
        </div>
    </form>
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

<?php function restaurantProfileBottom(array $tabs, int $scrollVal, Restaurant $restaurant, bool $is_owner){ 
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
                        if (!empty($restaurant->menus)){
                            foreach ($restaurant->menus as $menu) {
                                dishSearchCards($menu);
                            }
                        } else { ?>
                            <p class="subtitle2">There are no available menus! :(</p>
                        <?php } ?>
                    </div>
                </section>
                <section id="reviews">
                    <p class="h6">Reviews</p>
                    <?php
                        if (isset($_SESSION['id'])) {
                            reviewBox($restaurant);
                        }
                        if (!empty($restaurant->reviews)){
                            foreach ($restaurant->reviews as $review) {
                                drawReview($review, $review->getReviewer(getDatabase()));
                            }
                        } else { ?>
                            <p class="subtitle2">There are no reviews! :(</p>
                        <?php } ?>
                </section>
            </div>
        </div>
    </div>
<?php } ?>

