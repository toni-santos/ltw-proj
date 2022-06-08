<?php declare(strict_types=1); ?>

<?php function profileTop()
{
    if (isset($_SESSION['id'])) { // TODO: Check if owner and enable editing
        $db = getDatabase();
        global $user;
        $user = User::getUser($db, $_SESSION['id']);
    }  ?>
    <div id="profile-top">
        <div id="banner" class="shadow-nohov"></div>
        <div id="tabs-container">
            <img id="pfp" class="shadow-nohov" src="../images/placeholder.jpg"></img>
            <?php if (isset($_SESSION['id'])) { ?>
                <p class="h5"><?php echo $user->username; ?></p>
            <?php } else { ?>
                <p class="h5">name</p>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<?php function reviewBox()
{ ?>
    <form method="POST" action=""> <!-- TODO: review action -->
        <div class="textarea-container">
            <textarea placeholder=" " class="subtitle2 textbox" name="content" rows="3" cols="100"></textarea>
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
            <button class="button review-button">Review</button>
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

<?php function profileBottom(array $tabs, int $scrollVal){ 
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
                        for ($i = 0; $i < 10; $i++)
                            restaurantSearchCards();
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
        </div>
    </div>
<?php } ?>

