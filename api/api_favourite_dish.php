<?php

    declare(strict_types = 1);
    require("../actions/fav_dish_action.php");
    require_once("../database/db_loader.php");

    session_start();
    $db = getDatabase();

    if (isset($_SESSION['id'])) {
        $stmt = $db->prepare("SELECT * FROM FavDishes WHERE dishID=" . $_GET['fvi'] . " AND userID=" . $_SESSION['id']);
        $stmt->execute();

        if (empty($stmt->fetchAll())) fav_dish_action($db, $_GET['fvi']);
        else unfav_dish_action($db, $_GET['fvi']);
    }

?>