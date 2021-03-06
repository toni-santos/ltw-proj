<?php

    declare(strict_types = 1);
    session_start(['cookies_samesite' => 'Lax']);
    require_once("../database/db_loader.php");

    $db = getDatabase();

    if (isset($_SESSION['id'])) {

        $stmt = $db->prepare("INSERT INTO Review VALUES (?, ?, ?, ?)");
        $stmt->execute(array($_POST['restaurantID'], $_POST['reviewerID'], strip_tags($_POST['message']), $_POST['rating-star']));
        $_SESSION['messages']['add_review_success'] = "Added review!";

    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);

?>