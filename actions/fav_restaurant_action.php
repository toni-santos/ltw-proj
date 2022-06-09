<?php

    declare(strict_types = 1);

    function fav_restaurant_action($db, $fav_restaurant_id) {

        if (isset($_SESSION['id']) && isset($fav_restaurant_id)) {
            $stmt = $db->prepare("INSERT INTO FavRestaurants VALUES (?, ?)");
            $stmt->execute(array($fav_restaurant_id, $_SESSION['id']));
            echo json_encode(array('success' => true));
        } 
        else echo json_encode(array('success' => false));

    }

?>