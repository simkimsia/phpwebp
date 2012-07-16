<?php


	if (!empty($_POST['userid'])) {
		
		// the file that contains your database credentials like username and password
		require_once('config/database.php');

		// Slide 8 aka Step 1
		$mysqli = new mysqli($database_hostname, $database_username, $database_password, $database_name) or exit("Error connecting to database"); 

		// Slide 9 aka Step 2 --- notice the extra WHERE id = ? --- this is how we restrict to just 1 particular student
		$stmt = $mysqli->prepare("SELECT `userid` FROM `lesson11_users` WHERE `userid` = ?"); 

		// Slide 10 aka Step 3
		$stmt->bind_param("s", $_POST['userid']); // i is for integer, s is for string, userid is a string so s

		// Slide 10 aka Step 4
		$stmt->execute(); 

		/**
		* No. of variables MUST match no. of COLUMNS retrieved
		* Since in Step 2 we retrieved ONLY userid 
		**/
		// Slide 11 aka Step 5
		$stmt->bind_result($userid);

		// Slide 12 aka Step 6
		$stmt->fetch(); // no need for while loop since we want to fetch just 1 row.

		// now we check if the userid is already used
		$userIdAlreadyExists = !empty($userid);

		// Slide 13 aka Step 7 and 8
		$stmt->close();

		$mysqli->close();
		
		// this is the error validation
		if ($userIdAlreadyExists) {
			$errors['userid'] = "User ID is already used. Choose another user id";		
		}
		
	}