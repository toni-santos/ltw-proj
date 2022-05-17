<?php
	//starting the session
	session_start();

	//including the database connection
	require_once "../database/db_loader.php";

	echo "haha";
	var_dump($_POST);
	if(isset($_POST["name"])){
		// Setting variables
		$username = $_POST['name'];
        $email = $_POST['email'];
		$password = $_POST['pwd'];

		echo "bla";
	
		// Insertion Query
		$query = 'INSERT INTO User (userID, username, email, password, address, phoneNum, profilePic) VALUES(NULL, :username, :password, NULL, NULL, NULL)';

		echo isset($db);

		
		// $stmt = $db->prepare('INSERT INTO User (userID, username, email, password, address, phoneNum, profilePic) 
		// 						VALUES(NULL, :username, :email, :password, NULL, NULL, NULL)');
	
		// $stmt->bindParam(':username', $username);
		// $stmt->bindParam(':email', $email);
		// $stmt->bindParam(':password', $password);
		// $stmt->execute();

		// header("Location: ../index.php");


		
		// // Check if the execution of query is success
		// if($stmt->execute()){
		// 	echo "yay";
		// 	//setting a 'success' session to save our insertion success message.
		// 	$_SESSION['success'] = "Successfully created an account";

		// 	//redirecting to the index.php 
		// 	header("Location:index.php");
		
		// }
	}
?>