<?php

    declare(strict_types = 1);

    session_start();

    require_once('../database/db_loader.php');
    require_once('../php/restaurant.php');
    require_once('../php/user.php');
    require_once('../php/dish.php');

    $db = getDatabase();

    $restaurants = Restaurant::searchRestaurants($db, $_GET['s']);
    $dishes = Dish::searchDishes($db, $_GET['s']);
    $users = User::searchUsers($db, $_GET['s']);
    
    header("Location: /pages/search.php");
    
    //send info to frontend to be parsed

    //var_dump(json_encode($restaurants));
    //var_dump(json_encode($dishes));
    //var_dump(json_encode($users));


?>