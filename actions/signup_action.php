<?php
	//starting the session
	session_start();

	//including the database connection
	require_once "../database/db_loader.php";

	$db = getDatabase();
	$Error = "";

	// before processing information make sure that something was posted
	if($_SERVER['REQUEST_METHOD'] == "POST") {

		if(isset($_POST["name"])) {
			// Setting variables
			$username = trim($_POST['name']);
			if(!preg_match("/^[a-zA-Z]+$/", $username)) {
				$Error = "Please enter a valid username";
			}
			$username = addslashes($_POST['name']);  // avoid ' in username to be used maliciously (escape character)
			$email = $_POST['email'];
			$password = addslashes($_POST['pwd']);
			$pass = sha1($password);
		
			// Insertion Query
			$query = 'INSERT INTO User (userID, username, email, password, address, phoneNum, profilePic) VALUES(NULL, :username, :email, :password, NULL, NULL, NULL)';
			
			$stmt = $db->prepare($query);
		
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $pass);
			$exec = $stmt->execute();

			
			// Check if the execution of query is success
			if($exec) {
				//redirecting to the index.php 
				header("Location:../index.php");
			
			}
			// header('Location: ' . $_SERVER['HTTP_REFERER'])
		}

	}

?>