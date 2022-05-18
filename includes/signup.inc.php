<?php
	//starting the session
	session_start();

	//including the database connection
	require_once "../database/db_loader.php";

	$db = getDatabase();


	if(isset($_POST["name"])) {
		// Setting variables
		$username = $_POST['name'];
        $email = $_POST['email'];
		$password = $_POST['pwd'];
	
		// Insertion Query
		$query = 'INSERT INTO User (userID, username, email, password, address, phoneNum, profilePic) VALUES(NULL, :username, :email, :password, NULL, NULL, NULL)';
		
		$stmt = $db->prepare($query);
	
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->execute();

		
		// Check if the execution of query is success
		if($stmt->execute()) {
			//setting a 'success' session to save our insertion success message.
			$_SESSION['success'] = "Successfully created an account";

			//redirecting to the index.php 
			header("Location:../index.php");
		
		}
	}
?>