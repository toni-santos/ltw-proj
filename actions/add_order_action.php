<?php
    session_start(['cookies_samesite' => 'Lax']);    

    require_once('../database/db_loader.php');
    require_once('../php/order.php');

    $db = getDatabase();


    if (isset($_SESSION['id'])) {
        $orders = Order::getOrderByUser($db,$_SESSION['id']);

        for ($i = 0; $i < count($orders); $i++) {
            if (!in_array($orders[$i]->dishID, $_SESSION['orders'])) {
                $_SESSION['orders'][] = $_POST['dishID'];
            }
            if ($orders[$i]->dishID == $_POST['dishID']) {
                $orders[$i]->increaseOrderAmount($db);

                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }

        $order = new Order($_SESSION['id'], $_POST['dishID'], $_POST['restaurantID'], 1);
        $order->add_to_db($db);
        $_SESSION['orders'][] = $_POST['dishID'];
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>