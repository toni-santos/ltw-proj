<?php

    declare(strict_types = 1);

    session_start();

    require_once('../database/db_loader.php');
    require_once('../php/restaurant.php');
    require_once('../php/user.php');
    require_once('../php/dish.php');

    $db = getDatabase();
    $filters = array_values(array_diff($_GET['filters'], array(null)));

    $restaurants = isset($_GET['r_filter']) ? Restaurant::searchRestaurants($db, htmlspecialchars($_GET['s']), $filters) : null;
    $dishes = isset($_GET['d_filter']) ? Dish::searchDishes($db, htmlspecialchars($_GET['s']), $filters) : null;
    $users = isset($_GET['u_filter']) ? User::searchUsers($db, htmlspecialchars($_GET['s'])) : null;
    
    //send info to frontend to be parsed

?>