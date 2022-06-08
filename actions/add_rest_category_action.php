<?php

    declare(strict_types = 1);
    session_start();

    require_once("../database/db_loader.php");

    $db = getDatabase();

    if (isset($_SESSION['id'])) {
        $stmt = $db->prepare("SELECT * FROM RestOwner WHERE restaurantID = ? AND ownerID = ?");
        $stmt->execute(array($_POST['cat_restaurant_id'], $_SESSION['id']));

        if ($_SESSION['id'] === $stmt->fetch()['ownerID']) {

            foreach($_POST['categories'] as $category) {

                $stmt = $db->prepare("INSERT INTO RestaurantCategory VALUES(?, ?)");
                $stmt->execute(array($_POST['cat_restaurant_id'], $category));

            }   
        }
    }

    //header('Location: /pages/index.php');

?>