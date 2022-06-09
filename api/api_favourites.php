<?php

    declare(strict_types = 1);
    require("../actions/fav_restaurant_action.php");
    require_once("../database/db_loader.php");

    session_start();
    $db = getDatabase();

    $stmt = $db->prepare("SELECT * FROM FavRestaurants WHERE restaurantID=" . $_GET['fvi'] . " AND userID=" . $_SESSION['id']);
    $stmt->execute();

    if (empty($stmt->fetchAll())) fav_restaurant_action($db, $_GET['fvi']);
    else unfav_restaurant_action($db, $_GET['fvi']);

?>