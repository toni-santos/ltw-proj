<?php

    declare(strict_types = 1);
    session_start(['cookies_samesite' => 'Lax']);
    
    function setRestOwner($db, $restaurant_id) {
        if (isset($_SESSION['id']) && isset($restaurant_id)) {
            $stmt = $db->prepare("INSERT INTO RestOwner VALUES (?, ?)");
            $stmt->execute(array($restaurant_id, $_SESSION['id']));
        }

    }

?>