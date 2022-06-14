<?php
	session_start();
	
	require_once '../database/db_loader.php';
	require_once '../php/user.php';

	$db = getDatabase();

    if (!isset($_SESSION['id'])) die(header('Location: /'));

	$user = User::getUser($db, $_SESSION['id']);
    $userid = $_SESSION['id']; 

	if ($user) {

        $old_pwd = $_POST['curr-pwd']; 
        $check_pass = User::checkOldPassword($db, $userid, $old_pwd);
        
        if($check_pass == false) {
            $_SESSION['messages']['change_pass_success'] = "Wrong password!";
            die((header("Location: /pages/index.php")));
        }

        $new_pwd = $_POST['new-pwd'];
        $pass = password_hash($new_pwd, PASSWORD_DEFAULT);

        $stmt = $db->prepare("UPDATE User SET password = ? WHERE userID = ?");
        $result = $stmt->execute(array($pass, $_SESSION['id']));
        $_SESSION['messages']['change_pass_success'] = "Changed your password successfully!";
    }
	
 	header('Location: ' . $_SERVER['HTTP_REFERER']);
	
?>

