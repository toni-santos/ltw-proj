<?php

    declare(strict_types = 1);
    require_once("../database/db_loader.php");

    function getCategories(){

        $db = getDatabase();

        $stmt = $db->prepare("SELECT name FROM Category");
        $stmt->execute();

        echo json_encode($stmt->fetchAll());

    }

?>