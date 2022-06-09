<?php
	//starting the session
	session_start();

	//including the database connection
	require_once "../database/db_loader.php";
	require_once '../php/user.php';

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
			$address = addslashes($_POST['address']);
			$phoneNum = addslashes($_POST['tel']);
			// Insertion Query
			$query = 'INSERT INTO User (userID, username, email, password, address, phoneNum) VALUES(NULL, :username, :email, :password, :address, :phoneNum)';
			
			$stmt = $db->prepare($query);
		
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $pass);
			$stmt->bindParam(':phoneNum', $phoneNum);
			$stmt->bindParam(':address', $address);

			try {
				$exec = $stmt->execute();
			} catch (PDOException $e) {
				echo $e;
				die (header("Location /pages/index.php"));
			}

			
			// Check if the execution of query is success
			if($exec) {
				$user = User::getUserWithPassword($db, $_POST['email'], $_POST['pwd']);

				if ($user) {
					 $_SESSION['id'] = $user->userID;
				}
			
				//redirecting to the index.php 
				header("Location:../index.php");
			
			}
			// header('Location: ' . $_SERVER['HTTP_REFERER'])
		}

	}

?>