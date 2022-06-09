<?php function userProfileTop(User $user, bool $is_user)
{
    echo $user->username;
    if ($is_user) {
        drawFAB();
        userEditDialog();
    } ?>
    
    <div id="profile-top">
        <div id="banner" class="shadow-nohov"></div>
        <div id="tabs-container">
            <img id="pfp" class="shadow-nohov" src="../images/placeholder.jpg"></img>
            <p class="h5"><?php echo $user->username; ?></p>
        </div>
    </div>
<?php } ?>
<?php function userProfileBottom(array $tabs, int $scrollVal, ?User $user) { // TODO: refactor this when get is done?>  

    <div id="profile-bottom">
        <div id="content-wrapper">
            <section id="tabs" class="h6">
                <p class="current-tab" id="tab-0" onclick="snapContent(event, <?php echo $scrollVal; ?>, 'bottom-content', 'vertical')"><?php echo $tabs[0]; ?></p>
                <?php for ($i = 1; $i < count($tabs); $i++) { ?>
                    <p class="" id="tab-<?php echo $i; ?>" onclick="snapContent(event, <?php echo $scrollVal; ?>, 'bottom-content', 'vertical')"><?php echo $tabs[$i]; ?></p>
                <?php } ?>
            </section>
            <?php
            if (isset($_SESSION['id'])) { ?>
                <div id="bottom-content">
                    <section id="info">
                        <div>
                            <p class="h6">Personal Information</p>
                        </div>
                        <div id="personal-info-wrapper" class="shadow-nohov">
                            <div class="personal-info">
                                <span class="material-icons md-24 dark-bg">person</span>
                                <p class="body1">Username</p>
                                <p class="body2"><?php echo $user->username; ?></p>
                            </div>
                            <div class="personal-info">
                                <span class="material-icons md-24 dark-bg">email</span>
                                <p class="body1">Email</p>
                                <p class="body2"><?php echo $user->email; ?></p>
                            </div>
                            <div class="personal-info">
                                <span class="material-icons md-24 dark-bg">home</span>
                                <p class="body1">Address</p>
                                <p class="body2"><?php echo $user->address; ?></p>
                            </div>
                            <div class="personal-info">
                                <span class="material-icons md-24 dark-bg">phone</span>
                                <p class="body1">Phone Number</p>
                                <p class="body2"><?php echo $user->phoneNum; ?></p>
                            </div>
                        </div>
                    </section>
                    <section id="reviews">
                            <p class="h6">My Reviews</p>
                            <?php
                            for ($i = 0; $i < 10; $i++)
                                drawReview();
                            ?>
                    </section>
                    <section id="favorite-restaurants">
                        <p class="h6">Favorite Restaurants</p>
                        <div class="grid-wrapper">
                            <?php
                            for ($i = 0; $i < 10; $i++)
                                restaurantSearchCards();
                            ?>
                        </div>
                    </section>
                    <section id="favorite-dishes">
                        <p class="h6">Favorite Dishes</p>
                        <div class="grid-wrapper">
                            <?php
                            for ($i = 0; $i < 10; $i++)
                                dishSearchCards();
                            ?>
                        </div>
                    </section>
                </div>
            <?php } else { ?>
                <div id="bottom-content">
                    <section id="reviews">
                            <p class="h6">Reviews</p>
                            <?php
                            for ($i = 0; $i < 10; $i++)
                                drawReview();
                            ?>
                    </section>
                    <section id="favorite-restaurants">
                        <p class="h6">Favorite Restaurants</p>
                        <div class="grid-wrapper">
                            <?php
                            for ($i = 0; $i < 10; $i++)
                                restaurantSearchCards();
                            ?>
                        </div>
                    </section>
                    <section id="favorite-dishes">
                        <p class="h6">Favorite Dishes</p>
                        <div class="grid-wrapper">
                            <?php
                            for ($i = 0; $i < 10; $i++)
                                dishSearchCards();
                            ?>
                        </div>
                    </section>

                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>

<?php function userEditDialog() { ?>
    <dialog id="dialog-user-edit">
        <div id="top-form">
            <p class="h5">Edit Profile</p>
            <button value="cancel" class="blank-button" onclick="closeUserEdit()">
                <span class="material-icons">close</span>
            </button>
        </div>
        <form method="POST", action="../actions/edit_user_page_action.php">
            <section id="inputs-box">
                <div class="profile-pic-input">
                    <img src="../images/placeholder.jpg" id="profile-"></img>
                    <input type="file" name="profile-pic" id="pfp-input">
                    <label class="body2 dark-bg" for="pwd"  onclick="inputFile(event)"><span class="md-10 material-icons">edit</span></label> 
                </div>
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
            <!--    </div>
                <div class="input-container">
                    <input class="text text-input password subtitle2" type="password" name="pwd" placeholder=" " autocomplete="off" minlength="8">
                    <label class="body2 dark-bg" for="pwd" onclick="setFocus(event)">Password</label>
                    <span class="material-icons md-24 md-light password-eye" onclick="showPassword(event)">visibility</span>
                </div> -->
            </section>
            <button id="confirm-edit" class="button-form" type="submit" name="submit"> Edit </button>
        </form>
    </dialog>
<?php } ?>

<?php
function drawFAB()
{ ?>
    <div id="fab-wrapper" class="shadow-nohov">
        <span class="material-icons" id="fab" onclick="showUserEdit()">edit</span>
    </div>
<?php } ?>
