<?php

    declare(strict_types = 1);
    session_start();
    require_once("../database/db_loader.php");

    $db = getDatabase();

    if (isset($_SESSION['id'])) {

        $stmt = $db->prepare("INSERT INTO Review VALUES (?, ?, ?, ?)");
        if (!$stmt->execute(array($_POST['restaurantID'], $_POST['reviewerID'], strip_tags($_POST['message']), $_POST['rating-star']))) {
            header('Location: pages/index.php');
        }
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);

?>