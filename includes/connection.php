<?php
	//check if the database file exists and create a new if not
	if(!is_file('../database/database.db')){
		file_put_contents('../database/database.db', null);
	}
	// connecting the database
	$conn = new PDO('sqlite:../database/database.db');
	//Setting connection attributes
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//Query for creating user table in the database if not exist yet.
	$query = "CREATE TABLE IF NOT EXISTS `User`(userID INTEGER, username VARCHAR(255) NOT NULL, password  VARCHAR(255) NOT NULL, address TEXT, phoneNum  INTEGER, profilePic TEXT)";
	//Executing the query
	$conn->exec($query);
?>