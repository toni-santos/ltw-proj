<?php
	//starting the session
	session_start();

	//including the database connection
	require_once 'connection.php';
	
	if(ISSET($_POST['signup'])){
		// Setting variables
		$username = $_POST['username'];
        // $email = $_POST['email'];
		$password = $_POST['password'];
	
		
		// Insertion Query
		$query = "INSERT INTO `User`(userID, username, password, address, phoneNum, profilePic) VALUES(1, :username, :password, NULL, NULL, NULL)";

		$stmt = $db_loader->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password);
		
		// Check if the execution of query is success
		if($stmt->execute()){
			//setting a 'success' session to save our insertion success message.
			$_SESSION['success'] = "Successfully created an account";

			//redirecting to the index.php 
			header('location: index.php');
		}

	}
?>