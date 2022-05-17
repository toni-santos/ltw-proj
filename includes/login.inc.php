<?php
	session_start();
	require_once 'connection.php';
	
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$query = "SELECT COUNT(*) as count FROM `User` WHERE `username` = :username AND `password` = :password";
		$stmt = $db_loader->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		$row = $stmt->fetch();
		
		$count = $row['count'];
		
		if($count > 0){
			header('location:index.php');
		}else{
			$_SESSION['error'] = "Invalid username or password";
			header('location:login.php');
		}
	}
?>