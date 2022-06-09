<?php

    declare(strict_types = 1);
    // require_once("../database/db_loader.php");

    function getCategories(PDO $db){

        // $db = getDatabase();

        $stmt = $db->prepare("SELECT name FROM Category");
        $stmt->execute();

        $categories = array();
        while ($category = $stmt->fetch(PDO::FETCH_OBJ)) {
            $categories[] = $category->name;
        }

        return $categories;

        // AJAX 
        // echo json_encode($stmt->fetchAll());

    }

?>