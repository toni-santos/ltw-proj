<?php
    function removeOrder(PDO $db, int $dishID, int $userID) {
        $stmt = $db->prepare('
            DELETE FROM RequestItem 
            WHERE dishID = ? AND userID = ?
        ;');

        $stmt->execute(array($dishID, $userID));
    }
?>