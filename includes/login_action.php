<?php
	declare(strict_types = 1);

	session_start();
	require_once '../database/db_loader.php';
	require_once '../php/user.php';

	$db = getDatabase();

	$user = User::getUserWithPassword($db, $_POST['email'], $_POST['password']);

	if ($user) {
		$_SESSION['userID'] = $user->userID;
		$_SESSION['name'] = $user->name();
		header("Location:../index.php");
	}
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	
?>