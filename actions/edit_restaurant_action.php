<?php
    declare(strict_types = 1);
    session_start();

    require_once '../database/db_loader.php';
    require_once '../php/restaurant.php';

    $db = getDatabase();
    
    if (!isset($_SESSION['id'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);   
        die;  
    }

    $restaurant = Restaurant::getRestaurant($db, intval($_POST['restaurantID']));

    if ($restaurant) {
        if (!empty($_POST['name']))
            $restaurant->name = htmlspecialchars($_POST['name']);        
        if (!empty($_POST['location']))
            $restaurant->location = htmlspecialchars($_POST['location']);
        if (!empty($_POST['opening-time']))
            $restaurant->opening_time = $_POST['opening-time'];
        if (!empty($_POST['closing-time']))
            $restaurant->closing_time = $_POST['closing-time'];
        
            $restaurant->save_to_db($db);

            
        if (!empty($_POST['filters'])){
            $stmt = $db->prepare("
                DELETE FROM RestaurantCategory WHERE restaurantID = ?;
            ");
            
            $stmt->execute(array($restaurant->restaurantID));

            $restaurant->categories = array_diff($_POST['filters'], array(null));

            foreach ($restaurant->categories as $category) {
                $stmt2 = $db->prepare("
                    INSERT INTO RestaurantCategory VALUES (?, ?);
                ");
                $stmt2->execute(array($restaurant->restaurantID, $category));
            }
        }
        
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>