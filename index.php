<?php
    include('templates/commons.php');
    drawTop();
?>
<div class="main-top">
    <div class="top-text">
        <a id="top-desc">
            Welcome to (not) UberEats, this is definitely NOT UberEats, and we definitely DO NOT specialize in food delivery, bringing you food from your favourite restaurants.
        </a>
        <input type="search" name="restaurant-search" id="restaurant-search" placeholder="Search...">
    </div>
    <img src="images/placeholder_bg.jpg" id="top-background">
</div>
<div class="main-bottom">
    <h2>Our top picks</h2>
    <div class="carousel">
        <a class="prev"><</a>
        <a class="next">></a>
        <div id="carousel-item">
            <img src="images/placeholder.jpg" id="restaurant-pfp">
            <p>RESTAURANT 1</p>
        </div>
        <div id="carousel-item">
            <img src="images/placeholder.jpg" id="restaurant-pfp">
            <p>RESTAURANT 1</p>
        </div>
        <div id="carousel-item">
            <img src="images/placeholder.jpg" id="restaurant-pfp">
            <p>RESTAURANT 1</p>
        </div>
    </div>
</div>
<?php 
    drawBot();
?>

