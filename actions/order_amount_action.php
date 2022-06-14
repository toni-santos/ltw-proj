<?php

    require_once('../php/order.php');

    function decreaseOrderAmountAction(PDO $db, int $dishID, int $userID) {
        $stmt = $db->prepare('
            SELECT * 
            FROM RequestItem
            WHERE userID = ? AND dishID = ?;
        ');
        $stmt->execute(array($userID, $dishID));

        if ($res = $stmt->fetch(PDO::FETCH_OBJ)) {
            $order = new Order(
                $res->userID,
                $res->dishID,
                $res->restaurantID,
                $res->amount
            );
        }

        $stmt2 = $db->prepare('
            UPDATE RequestItem
            SET amount = ?
            WHERE restaurantID = ? AND userID = ? AND dishID = ?
        ');
        $stmt2->execute(array($order->amount - 1 , $order->restaurantID, $order->userID, $order->dishID));

    }

    function increaseOrderAmountAction(PDO $db, int $dishID, int $userID) {
        $stmt = $db->prepare('
            SELECT * 
            FROM RequestItem
            WHERE userID = ? AND dishID = ?;
        ');
        $stmt->execute(array($userID, $dishID));

        if ($res = $stmt->fetch(PDO::FETCH_OBJ)) {
            $order = new Order(
                $res->userID,
                $res->dishID,
                $res->restaurantID,
                $res->amount
            );
        }

        $stmt2 = $db->prepare('
            UPDATE RequestItem
            SET amount = ?
            WHERE restaurantID = ? AND userID = ? AND dishID = ?
        ');
        $stmt2->execute(array($order->amount + 1 , $order->restaurantID, $order->userID, $order->dishID));
    }
?>