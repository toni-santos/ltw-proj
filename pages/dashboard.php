<?php
session_start();

require_once('../templates/commons.php');
require_once('../templates/search.tpl.php');

drawTop(["commons", "forms", "search", "dashboard"], ["hamburger", "forms"]);
drawRestaurantDialog();
?>

<div id="main-top">
    <p class="h5">My Restaurants</p>
    <span id="add-restaurant" class="pointer material-icons md-light" onclick="showRestaurantDialog()">add</span>
</div>
<section class="grid-wrapper">
    <?php
    for ($i = 0; $i < 10; $i++) {
        restaurantSearchCards();
    }
    ?>
</section>
<?php
drawFooter();
?>