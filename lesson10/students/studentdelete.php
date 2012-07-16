<?php

		// we need to know the student id so that we can delete the right student
		$studentID = $_GET['id'];

		// the file that contains your database credentials like username and password
		require_once('config/database.php');

		// see Lecture Webp_Week13_14_Using_PHPandMySQL(updating).pptx Slide 4 aka Step 1
		$mysqli = new mysqli($database_hostname, $database_username, $database_password, $database_name) or exit("Error connecting to database"); 

		// Slide 5 aka Step 2
		$stmt = $mysqli->prepare("DELETE FROM `lesson10_students` WHERE `id` = ?"); 

		// Slide 6 aka Step 3 the bind params must correspond to the ?
		$stmt->bind_param("i", $studentID); // 1 ? so we use i. we use i because  id is INT

		// Slide 7 aka Step 4
		$successfullyDeleted = $stmt->execute(); 
		
		// Slide 8 aka Step 5
		// we won't check the delete result here.
		
		// Slide 9 aka Step 6 and 7
		$stmt->close();
		
		$mysqli->close();
		
		// if we successfully delete this, we 
		if ($successfullyDeleted) {
			$_SESSION['message'] = 'Successfully deleted';
		} else {
			$_SESSION['message'] = 'Unable to delete';
		}
		
		header('Location: index.php');

?>