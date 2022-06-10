<?php

    declare(strict_types = 1);
    session_start();
    require_once("../database/db_loader.php");

    $db = getDatabase();

    if (isset($_SESSION['id'])) {

        $stmt = $db->prepare("INSERT INTO Review VALUES (?, ?, ?, ?)");
        $stmt->execute(array($_POST['restaurantID'], $_POST['reviewerID'], htmlspecialchars($_POST['message']), $_POST['rating-star']));
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);

?>