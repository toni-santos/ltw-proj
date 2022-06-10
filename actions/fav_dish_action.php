<?php

    declare(strict_types = 1);

    function fav_dish_action($db, $fav_dish_id) {

        if (isset($_SESSION['id']) && isset($fav_dish_id)) {
            $stmt = $db->prepare("INSERT INTO FavDishes VALUES (?, ?)");
            $stmt->execute(array($fav_dish_id, $_SESSION['id']));
            echo json_encode(array('success' => true));
        } 
        else echo json_encode(array('success' => false));

    }

    function unfav_dish_action($db, $fav_dish_id) {
        
        if (isset($_SESSION['id']) && isset($fav_dish_id)) {
            $stmt = $db->prepare("DELETE FROM FavDishes WHERE dishID = ? AND userID = ?");
            $stmt->execute(array($fav_dish_id, $_SESSION['id']));
            echo json_encode(array('success' => true));
        } 
        else echo json_encode(array('success' => false));

    }

?>