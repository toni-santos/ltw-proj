<?php
	session_start();
	
	require_once '../database/db_loader.php';
	require_once '../php/user.php';

	$db = getDatabase();
	$user = User::getUserWithPassword($db, $_POST['email'], $_POST['pwd']);

	if ($user) {
	 	$_SESSION['id'] = $user->userID;
	 	$_SESSION['name'] = $user->name();
		header("Location:../index.php");
	}
	
	// header('Location: ' . $_SERVER['HTTP_REFERER']);
	
	// header('Location: ' . $_SERVER['HTTP_REFERER']);

	// if(isset($_POST['email'])){
	// 	$email = $_POST['email'];
	// 	$password = $_POST['pwd'];
			
	// 	$query = 'SELECT COUNT(*) as count FROM User WHERE email = :email AND password = :password';
	// 	$stmt = $db->prepare($query);
	// 	$stmt->bindParam(':email', $email);
	// 	$stmt->bindParam(':password', $password);
	// 	$stmt->execute();
	// 	$row = $stmt->fetch();
		
	// 	$count = $row['count'];

	// 	if($count > 0){
	// 		header("Location:../index.php");
	// 	}else{
	// 	 	$_SESSION['error'] = "Invalid email or password";
	// 	 	header("Location:../login.php");
	// 	}
	// }
	
?>