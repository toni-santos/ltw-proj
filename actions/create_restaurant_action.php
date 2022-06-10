<?php

    declare(strict_types = 1);
    require_once("../database/db_loader.php");
    require_once("add_res_owner_action.php");
    
    $db = getDatabase();

    $rest_name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars($_POST['email']);
    $opening_time = trim($_POST['opening-time']);
    $closing_time = trim($_POST['closing_time']);

    $restaurant = new Restaurant(
        null,
        $rest_name,
        $email,
        $opening_time,
        $closing_time
    );

    $restaurant->add_to_db($db);
    setRestOwner($db, $restaurant->restaurantID);

?>