<?php

    declare(strict_types = 1);

    require_once('../database/db_loader.php');
    require_once('../php/dish.php');

    $db = getDatabase();

    $dish_name = htmlspecialchars($_POST['name']);
    $price = floatval($_POST['price']);
    $category = $_POST['dish-categories'];
    $restaurantID = $_POST['restaurantID'];

    $dish = new Dish(
        null,
        $dish_name,
        $price,
        $category
    );

    $dish->add_to_db($db);

    $image = $_FILES['dish-pic'];
    $path = "../images/dish_images/";
    $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
    
    if (is_uploaded_file($image['tmp_name'])) {

        $existent_pic = glob("$path/dish{$dish->_dishID}.*");
        if (!empty($existent_pic)) {
            unlink($existent_pic[0]);
        }
        
        move_uploaded_file($image['tmp_name'], $path . 'dish' . $dish->_dishID . '.' . $ext);
    }

    
    $stmt = $db->prepare('INSERT INTO Menu VALUES (?, ?)');
    $stmt->execute(array($restaurantID, $dish->_dishID));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>