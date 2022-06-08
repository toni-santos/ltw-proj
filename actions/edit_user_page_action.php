<?php
    declare(strict_types = 1);
    session_start();

    require_once '../database/db_loader.php';
    require_once '../php/user.php';

    $db = getDatabase();
    
    if (!isset($_SESSION['id'])) die(header('Location: /'));

    $user = User::getUser($db, $_SESSION['id']);

    if ($user) {
        $user->username = $_POST['name'];
        $user->email = $_POST['email'];
        $user->address = $_POST['address'];
        $user->phoneNum = intval($_POST['tel']);
        
        $user-> save_to_db($db);
    }

    header('Location: /pages/user_page.php ');
?>