<?php declare(strict_types=1); ?>

<?php function restaurantProfileTop(Restaurant $restaurant)
{ ?>
    <div id="profile-top">
        <div id="banner" class="shadow-nohov"></div>
        <div id="tabs-container">
            <img alt="Restaurant picture" id="pfp" class="shadow-nohov" src="../images/rest_images/rest<?= $restaurant->restaurantID; ?>.jpg"></img>
            <p class="h5"><?= $restaurant->name; ?></p>
            <div><p id="profile-top-rating" class="body1 dark-bg rating"><?php
                if (isset($restaurant->rating)) {
                    echo $restaurant->rating;
                } else {
                    echo "N/A";
                }?><span class="material-icons"  style="color:var(--dark-main-highlight);">star</span></p></div>
        </div>
    </div>
<?php } ?>

<?php function reviewBox(Restaurant $restaurant)
{ ?>
    <form method="POST" action="../actions/add_review_action.php">
        <div class="textarea-container">
            <textarea placeholder=" " id="message" class="subtitle2 textbox" name="message" rows="3" cols="100"></textarea>
            <label class="body2" for="message">Review</label>
        </div>
        <div id="stars-button-container">
            <div class="star-container">
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <input class="star input-star" type="radio" name="rating-star" id="star-<?= $i ?>" value="<?= $i+1 ?>" required>
                        <label id="star-label-<?= $i ?>" class="material-icons" onclick="selectStar(event)">
                            <span>star_outline</span>
                        </label>
                    
                <?php } ?>
            </div>
            <input type="hidden" name="restaurantID" value="<?= $restaurant->restaurantID; ?>">
            <input type="hidden" name="reviewerID" value="<?= $_SESSION['id']; ?>">
            <button class="button review-button" type="submit" value="Submit">Review</button>
        </div>
    </form>
<?php } ?>

<?php function restaurantEditDialog(Restaurant $restaurant) { ?>
    <dialog id="dialog-restaurant-edit">
        <div class="top-form">
            <p class="h5">Edit Restaurant</p>
            <button value="cancel" class="blank-button" onclick="closeRestaurantEdit()">
                <span class="material-icons">close</span>
            </button>
        </div>
        <form id="form-restaurant", enctype="multipart/form-data" action="../actions/edit_restaurant_action.php" method="POST">
            <section id="inputs-box">
                <div class="profile-pic-input">
                    <img alt="Restaurant picture" src="../images/rest_images/rest<?=$restaurant->restaurantID?>.png" id="profile-img">
                    <input type="file" accept="image/*" name="restaurant-pic" id="pfp-input-restaurant">
                    <label class="body2 dark-bg" for="pfp-input-restaurant" onclick="inputFile(event)"><span class="md-10 material-icons">edit</span></label> 
                </div>
                <div class="input-container">
                    <input class="text text-input subtitle2" type="text" name="name" autocomplete="off" placeholder=" ">
                    <label class="body2" for="name" onclick="setFocus(event)">Name</label>
                </div>
                <div class="input-container">
                    <input class="text text-input subtitle2" type="text" name="location" autocomplete="email" placeholder=" ">
                    <label class="body2" for="location" onclick="setFocus(event)">Location</label>
                </div>
                <div class="input-container">
                    <input class="text text-input subtitle2" type="time" name="opening-time" autocomplete="off" placeholder=" ">
                    <label class="body2" for="opening-time" onclick="setFocus(event)">Opening Time</label>
                </div>
                <div class="input-container">
                    <input class="text text-input subtitle2" type="time" name="closing-time" autocomplete="off" placeholder=" ">
                    <label class="body2" for="closing-time" onclick="setFocus(event)">Closing Time</label>
                </div>
            </section>
            <section id="category-wrapper">
                <?php 
                $db = getDatabase();
                $categories = getCategories($db);
                for ($i = 0; $i < count($categories); $i++) {
                    if (in_array($categories[$i], $restaurant->categories)) {
                        checkboxButton($categories[$i], true);
                    } else {
                        checkboxButton($categories[$i], false);
                    }
                }
                ?>
            </section>
            <input type="hidden" name="restaurantID" value="<?= $restaurant->restaurantID ?>">
            <button id="confirm-restaurant" class="button-form" type="submit" name="submit" value="confirm">Confirm</button>
        </form>
    </dialog>
<?php } ?>

<?php function addDishDialog(Restaurant $restaurant) { ?>
    <dialog id="dialog-dish-add">
        <div class="top-form">
            <p class="h5">Add Dish</p>
            <button value="cancel" class="blank-button" onclick="closeDishAdd()">
                <span class="material-icons">close</span>
            </button>
        </div>
        <form id="form-dish", enctype="multipart/form-data" action="../actions/add_dish_action.php" method="POST">
            <section id="inputs-box">
                <div class="profile-pic-input">
                    <img alt="Dish picture" src="../images/placeholder.jpg" id="profile-img">
                    <input type="file" accept="image/*" name="dish-pic" id="pfp-input-dish" required>
                    <label class="body2 dark-bg" for="pfp-input-dish" onclick="inputFile(event)"><span class="md-10 material-icons">edit</span></label> 
                </div>
                <div class="input-container">
                    <input class="text text-input subtitle2" type="text" name="name" autocomplete="off" placeholder=" " onkeyup="updateForm(event)" onfocus="checkFilled(event)" required>
                    <label class="body2" for="name" onclick="setFocus(event)">Name</label>
                    <span class="error subtitle2 transparent">Required</span>
                </div>
                <div class="input-container">
                    <input class="text text-input subtitle2" type="number" name="price" autocomplete="off" placeholder=" " onkeyup="updateForm(event)" onfocus="checkFilled(event)" required>
                    <label class="body2" for="location" onclick="setFocus(event)">Price</label>
                    <span class="error subtitle2 transparent">Required</span>
                </div>
                <select id="dish-categories" class="shadow-nohov pointer dark-bg" name="dish-categories">
                    <?php 
                    $db = getDatabase();
                    $categories = getCategories($db);
                    foreach ($categories as $category) { ?>
                        <option value="<?= $category ?>"><?= $category ?></option>
                    <?php } ?>
                </select>
            </section>
            <input type="hidden" name="restaurantID" value="<?= $restaurant->restaurantID ?>">
            <button id="confirm-dish" class="button-form" type="submit" name="submit" value="Signup" disabled>Create Dish</button>
        </form>
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
                <p class="current-tab" id="tab-0" onclick="snapContent(event, 0, 'bottom-content', 'vertical')"><?php echo $tabs[0]; ?></p>
                <?php for ($i = 1; $i < count($tabs); $i++) { ?>
                    <p class="" id="tab-<?php echo $i; ?>" onclick="snapContent(event, <?php $scroll = intval($scrollVal) * $i; echo $scroll; ?>, 'bottom-content', 'vertical')"><?php echo $tabs[$i]; ?></p>
                <?php } ?>
            </section>
            <div id="bottom-content">
                <section id="info">
                    <div class="bottom-content-top">
                        <p class="h5">Info</p>
                        <?php if ($is_owner) {?>
                        <span class="material-icons settings" onclick="showRestaurantEdit()">settings</span>
                        <?php }?>
                    </div>
                    <div id="personal-info-wrapper" class="shadow-nohov">
                            <div class="personal-info">
                                <span class="material-icons md-24 dark-bg">menu_book</span>
                                <p class="body1">Categories</p>
                                <div class="profile-info-categories body2">
                                    <?php 
                                    foreach ($restaurant->categories as $category) {?>
                                        <a class="shadow-nohov"><?= $category; ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="personal-info">
                                <span class="material-icons md-24 dark-bg">place</span>
                                <p class="body1">Location</p>
                                <p class="body2"><?= $restaurant->location; ?></p>
                            </div>
                            <div class="personal-info">
                                <span class="material-icons md-24 dark-bg">schedule</span>
                                <p class="body1">Opening Hours</p>
                                <p class="body2"><?= $restaurant->opening_time; ?></p>
                            </div>
                            <div class="personal-info">
                                <span class="material-icons md-24 dark-bg">schedule</span>
                                <p class="body1">Closing Hours</p>
                                <p class="body2"><?= $restaurant->closing_time; ?></p>
                            </div>
                        </div>
                    <div>
                </section>
                <section id="menus">
                    <div class="bottom-content-top">
                        <p class="h5">Menus</p>
                        <?php if ($is_owner) {?>
                        <span class="material-icons .md-18 settings" onclick="showDishAdd()">add</span>
                        <?php }?>
                    </div>
                    <div class="grid-wrapper">
                        <?php
                        if (!empty($restaurant->menus)){
                            foreach ($restaurant->menus as $menu) {
                                dishSearchCards($menu, $is_owner, $restaurant->restaurantID, false);
                            }
                        } else { ?>
                            <p class="subtitle2">There are no available menus! :(</p>
                        <?php } ?>
                    </div>
                </section>
                <section id="reviews">
                    <div class="bottom-content-top">
                        <p class="h5">Reviews</p>
                    </div>
                    <?php
                        if (isset($_SESSION['id']) && !$is_owner) {
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

<?php
function drawFAB()
{ ?>
    <div id="fab-wrapper" class="shadow-nohov">
        <span class="material-icons dark-bg" id="fab" onclick="showCheckout()">shopping_cart</span>
    </div>
<?php } ?>