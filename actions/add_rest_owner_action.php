<?php

    declare(strict_types = 1);
    session_start();

    require_once("../database/db_loader.php");

    $db = getDatabase();

    if (isset($_SESSION['id']) && isset($_GET['owner_restaurant_id'])) {
        $stmt = $db->prepare("INSERT INTO RestOwner VALUES (?, ?)");
        $stmt->execute(array($_GET['owner_restaurant_id'], $_SESSION['id']));
    }

    //header('Location: /pages/index.php');

?>