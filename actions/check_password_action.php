<?php

    declare(strict_types = 1);

    function checkPassword($db, $password) {
       if (isset($_SESSION['id'])) {

         $stmt = $db->prepare("SELECT * FROM User WHERE userID = ? and password = ?");
         $stmt->execute(array($_SESSION['id'], $password));

         if ($stmt->fetch()) {
            echo json_encode(["success" => true]);
         } else echo json_encode(["success" => false]);
       }
    }


?>