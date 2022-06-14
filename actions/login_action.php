<?php
	session_start(['cookies_samesite' => 'Lax']);
	
	require_once '../database/db_loader.php';
	require_once '../php/user.php';

	$db = getDatabase();
	$user = User::getUserWithPassword($db, $_POST['email'], $_POST['pwd']);

	if ($user) {
	 	$_SESSION['id'] = $user->userID;
		$_SESSION['orders'] = [];
		$_SESSION['messages']['login_success'] = "Login successful!";
	} else $_SESSION['messages']['login_success'] = "Failed to log in!";
	
 	header('Location: /pages/index.php');
	
?>