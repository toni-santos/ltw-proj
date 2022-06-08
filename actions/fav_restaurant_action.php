<?php

    declare(strict_types = 1);
    session_start();

    require_once("../database/db_loader.php");

    $db = getDatabase();

    if (isset($_SESSION['id']) && isset($_POST['fav_restaurant_id'])) {
        $stmt = $db->prepare("INSERT INTO FavRestaurants VALUES (?, ?)");
        $stmt->execute(array($_POST['fav_restaurant_id'], $_SESSION['id']));
    }

    //header('Location: /pages/index.php');

?>