<?php

	// this file is responsible for just inserting a new datarecord into database

	// the file that contains your database credentials like username and password
	require_once('config/database.php');

	// see Lecture Webp_Week13_14_Using_PHPandMySQL(updating).pptx Slide 4 aka Step 1
	$mysqli = new mysqli($database_hostname, $database_username, $database_password, $database_name) or exit("Error connecting to database"); 

	// Slide 5 aka Step 2
	$stmt = $mysqli->prepare("INSERT INTO `lesson10_students` (`name`,`gpa`,`image`) VALUES (?, ?, ?)"); 

	// Slide 6 aka Step 3 the bind params must correspond to the ?
	$stmt->bind_param("sss", $newName, $newGPA, $newFileName); // 3 ??? so we use sss. we use sss because name, gpa, image is varchar in the table 

	// Slide 7 aka Step 4
	$successfullyInserted = $stmt->execute(); 

	// Slide 8 aka Step 5
	// we won't check the update result here.

	// Slide 9 aka Step 6 and 7
	$stmt->close();

	$mysqli->close();

?>