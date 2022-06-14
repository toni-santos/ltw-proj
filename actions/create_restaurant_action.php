<?php

    declare(strict_types = 1);
    require_once("../database/db_loader.php");
    require_once("add_rest_owner_action.php");
    require_once("../php/restaurant.php");
    
    $db = getDatabase();

    $rest_name = htmlspecialchars(trim($_POST['name']));
    $location = htmlspecialchars($_POST['location']);
    $opening_time = $_POST['opening-time'];
    $closing_time = $_POST['closing-time'];

    $restaurant = new Restaurant(
        null,
        $rest_name,
        $location,
        $opening_time,
        $closing_time
    );

    
    $restaurant->add_to_db($db);
    $categories = array_diff($_POST['filters'], array(null));

    foreach ($categories as $category) {
        $stmt2 = $db->prepare("
            INSERT INTO RestaurantCategory VALUES (?, ?);
        ");
        if ($stmt2->execute(array($restaurant->restaurantID, $category))) {
            $_SESSION['messages']['create_rest_success'] = "Your restaurant has been successfully created!";
        } else $_SESSION['messages']['create_rest_success'] = "Failed to create your restaurant!";
    }
    setRestOwner($db, $restaurant->restaurantID);

    header('Location: '. $_SERVER['HTTP_REFERER']);
?>