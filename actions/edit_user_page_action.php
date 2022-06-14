<?php
    declare(strict_types = 1);
    session_start();

    require_once '../database/db_loader.php';
    require_once '../php/user.php';

    $db = getDatabase();
    
    if (!isset($_SESSION['id'])) die(header('Location: /'));

    $user = User::getUser($db, $_SESSION['id']);
    
    if ($user) {
        if ($_FILES['profile-pic']['size'] != 0) {
            
            $image = $_FILES['profile-pic'];
            $path = "../images/user_images/";
            $ext = pathinfo($image['name'], PATHINFO_EXTENSION);

            if (!exif_imagetype($image['tmp_name'])) die("Please upload an image!");
            if (is_uploaded_file($image['tmp_name'])) {

                $existent_pic = glob("$path/user{$_SESSION['id']}.*");

                if (!empty($existent_pic)) {
                    unlink($existent_pic[0]);
                }

                move_uploaded_file($image['tmp_name'], $path . 'user' . $_SESSION['id'] . '.' . $ext);
            }

        }
        if (!empty($_POST['name']))
            $user->username = htmlspecialchars(strip_tags($_POST['name']));        
        if (!empty($_POST['e-mail']))
            $user->email = htmlspecialchars(strip_tags($_POST['e-mail']));
        if (!empty($_POST['address']))
            $user->address = htmlspecialchars(strip_tags($_POST['address']));
        if (!empty($_POST['tel']))
            $user->phoneNum = intval($_POST['tel']);
        
        $user->save_to_db($db);
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>