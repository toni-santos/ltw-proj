<?php

    declare(strict_types = 1);
    require_once("../actions/order_amount_action.php");
    require_once("../actions/remove_order_action.php");
    require_once("../database/db_loader.php");

    session_start();
    $db = getDatabase();

    if (isset($_SESSION['id'])) {
        if (isset($_GET['remove'])) {
            removeOrder($db, intval($_GET['dishID']), intval($_SESSION['id']));
            $_SESSION['orders'] = array_merge(array_diff($_SESSION['orders'], array($_GET['dishID'])));
            echo json_encode(array('success' => true));
        } else if (isset($_GET['decrease'])) {
            decreaseOrderAmountAction($db, intval($_GET['dishID']), intval($_SESSION['id']));
            echo json_encode(array('success' => true));
        } else if (isset($_GET['increase'])) {
            increaseOrderAmountAction($db, intval($_GET['dishID']), intval($_SESSION['id']));
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false));
        }
    }

?>
