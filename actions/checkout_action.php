<?php
    session_start(['cookies_samesite' => 'Lax']);

    require_once('../database/db_loader.php');
    require_once("../actions/remove_order_action.php");
    require_once('../php/order.php');
    $db = getDatabase();

    if (isset($_SESSION['id'])) {
        $stmt = $db->prepare('
            INSERT INTO Request
            VALUES(?, ?, ?, ?, ?);
        ');
        $stmt->execute(array(null, $_POST['restID'], $_SESSION['id'], "Received", $_POST['val']));
        $db->lastInsertId('Request');

        foreach ($_SESSION['orders'] as $order) {
            $order = Order::getOrderByDish($db, intval($order));
            if ($order->restaurantID == $_POST['restID']) {
                removeOrder($db, intval($order->dishID), intval($_SESSION['id']));
                $_SESSION['orders'] = array_merge(array_diff($_SESSION['orders'], array($order->dishID)));
            }
        }
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>