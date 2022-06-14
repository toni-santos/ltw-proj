<?php
	session_start();
	
	require_once '../database/db_loader.php';
	require_once '../php/user.php';

	$db = getDatabase();

    if (!isset($_SESSION['id'])) die(header('Location: /'));

	$user = User::getUser($db, $_SESSION['id']);
    $userid = $_SESSION['id']; 

	if ($user && !empty($_POST['submit-pwd']) ) {

        $old_pwd = $_POST['curr-pwd']; 
        $check_pass = User::checkOldPassword($db, $userid, $old_pwd);
        
        if($check_pass == false) 
            die((header("Location /pages/index.php")));
        
        $new_pwd = $_POST['new-pwd']; 
        $pass = password_hash($new_pwd, PASSWORD_DEFAULT);
        $sql = "UPDATE User SET password = :pass WHERE userID = :userid";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':password', $pass);

        $result = $stmt->execute();
    }
	
 	header('Location: /pages/user_profile.php');
	
?>

