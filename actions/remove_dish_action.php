<?php 
    declare(strict_types = 1);

    require_once('../database/db_loader.php');
    require_once('../php/dish.php');

    $db = getDatabase();

    $stmt = $db->prepare('DELETE FROM Menu WHERE restaurantID = ? AND dishID = ?');
    $stmt->execute(array($_POST['restaurantID'], $_POST['dishID']));

    $stmt2 = $db->prepare('DELETE FROM DISH WHERE dishID = ?');
    $stmt2->execute(array($_POST['dishID']));

    $_SESSION['messages']['remove_dish_success'] = "Dish removed successfully!";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>