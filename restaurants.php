<?php
require_once('templates/commons.php');

drawTop(["restaurants", "commons"], ["hamburger.js"]);
?>
<div>
    <h2>Restaurants</h2>
    <img src="images/placeholder_bg.jpg">
</div>
<div>
    <input type="search">
</div>
<section>
    <!-- MAKE IT INTO A TEMPLATE -->
    <div>
        <img src="images/placeholder.jpg">
        <h4>Restaurant name</h4>
    </div>
</section>
<?php
drawFooter();
?>