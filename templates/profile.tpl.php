<?php

declare(strict_types=1);

require_once('../database/db_loader.php');
?>

<?php function drawReview(Review $review, User $user)
{ ?>
    <section class="review">
        <div class="review-head">
            <div class="reviewer-info">
                <img src="../images/placeholder.jpg" class="reviewer-pfp">
                <p class="reviewer-name subtitle1"><a href="../pages/user_profile.php?id=<?= $user->userID; ?>"><?= $user->username; ?></a> - <a href="../pages/restaurant_profile.php?id=<?= $review->getRestaurant(getDatabase())->restaurantID; ?>"><?= $review->getRestaurant(getDatabase())->name; ?></a></p>
            </div>
            <p class="reviewer-score subtitle1"><?= $review->rating; ?> <span class="material-icons">star</span></p>
        </div>
        <article class="subtitle2">
            <?php echo $review->message; ?>
        </article>
    </section>
<?php } ?>
