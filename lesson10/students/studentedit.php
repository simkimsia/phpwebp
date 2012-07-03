<?php

	$userArriveBySubmittingAForm = !empty($_POST);
	
	if ($userArriveBySubmittingAForm) {
		// we need to know the student id so that we can change the right student
		$studentID = $_POST['id'];
		
		// the new values to update the student
		$newName = $_POST['name'];
		$newGPA = $_POST['gpa'];

		// the file that contains your database credentials like username and password
		require_once('config/database.php');

		// see Lecture Webp_Week13_14_Using_PHPandMySQL(updating).pptx Slide 4 aka Step 1
		$mysqli = new mysqli($database_hostname, $database_username, $database_password, $database_name) or exit("Error connecting to database"); 

		// Slide 5 aka Step 2
		$stmt = $mysqli->prepare("UPDATE `lesson10_students` SET `name` = ?, `gpa` =? WHERE `id` = ?"); 

		// Slide 6 aka Step 3 the bind params must correspond to the ?
		$stmt->bind_param("ssi", $newName, $newGPA, $studentID); // 3 ??? so we use ssi. we use ssi because name, gpa is varchar in the table and id is INT

		// Slide 7 aka Step 4
		$successfullyUpdated = $stmt->execute(); 
		
		// Slide 8 aka Step 5
		// we won't check the update result here.
		
		// Slide 9 aka Step 6 and 7
		$stmt->close();
		
		$mysqli->close();
	}

?>