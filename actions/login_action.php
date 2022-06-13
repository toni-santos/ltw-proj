<?php
	session_start();
	
	require_once '../database/db_loader.php';
	require_once '../php/user.php';

	$db = getDatabase();
	$user = User::getUserWithPassword($db, $_POST['email'], $_POST['pwd']);

	if ($user) {
	 	$_SESSION['id'] = $user->userID;
		$_SESSION['orders'] = [];
	}
	
 	header('Location: /pages/index.php');
	
?>