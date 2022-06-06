<?php

    declare(strict_types = 1);

    session_start();

    require_once('../database/db_loader.php');
    require_once('../php/restaurant.php');
    require_once('../php/user.php');
    require_once('../php/dish.php');

    $db = getDatabase();

    $filters = array($_GET['']);

    $restaurants = isset($_GET['r_filter']) ? Restaurant::searchRestaurants($db, $_GET['s']) : null;
    $dishes = isset($_GET['d_filter']) ? Dish::searchDishes($db, $_GET['s']) : null;
    $users = isset($_GET['u_filter']) ? User::searchUsers($db, $_GET['s']) : null;
    
    header("Location: /pages/search.php");
    
    //send info to frontend to be parsed
    
    //print_r(json_encode($restaurants));
    //echo "<br> <br> <br>";
    //print_r(json_encode($dishes));
    //echo "<br> <br> <br>";
    //print_r(json_encode($users));
    //echo "<br> <br> <br>";

?>