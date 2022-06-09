<?php

    declare(strict_types = 1);
    require("../actions/fav_restaurant_action.php");
    require_once("../database/db_loader.php");

    session_start();
    fav_restaurant_action(getDatabase(), $_GET['fvi']);

?>