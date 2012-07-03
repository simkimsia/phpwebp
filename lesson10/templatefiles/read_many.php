<?php
	// this is the template based on Lecture Webp_Week10b11_Using_PHPandMySQL(Query).pptx Slide 8 aka Step 1
	$database_hostname = 'localhost'; // usually  it is localhost or 127.0.0.1
	$database_name = 'phpwebp_11012345a'; // the name of your database
	$database_username = 'root'; // the username to access MySQL
	$database_password = null; // the password to access MySQL
	
	// see Lecture Webp_Week10b11_Using_PHPandMySQL(Query).pptx Slide 8 aka Step 1
	$mysqli = new mysqli($database_hostname, $database_username, $database_password, $database_name) or exit("Error connecting to database"); 
	
	/**
	* Select means find 
	* * means ALL the COLUMNS 
	* FROM xxx means you will do your Select inside the table named xxx
	**/
	// Slide 9 aka Step 2
	$stmt = $mysqli->prepare("SELECT * FROM lesson10_students"); 
	
	// Slide 10 aka Step 3
	// no placeholder ? in step 2 means we no need Step 3
	
	// Slide 11 aka Step 4
	$stmt = $mysqli->execute(); 
	
	/**
	* No. of variables MUST match no. of COLUMNS retrieved
	* Since in Step 2 we retrieved * meaning ALL the Columns
	* we need to have the same number of variables
	* Currently, lesson10_students have the following COLUMNS in this exact order

	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `name` varchar(255) NOT NULL,
	  `gpa` varchar(255) NOT NULL,
	  `image` varchar(255) NOT NULL,
	**/
	// Slide 12 aka Step 5
	$stmt->bind_result($id, $name, $gpa, $image);
	
	// Slide 13 aka Step 6
	$students = array(); // prepare an empty array to store all the results fetched from database
	while ($stmt->fetch) {
		// adding the fetched results one by one using the while loop
		$students[$id] = array(
			'id' => $id,
			'name' => $name,
			'gpa' => $gpa,
			'image' => $gpa
		);
	}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			PHP code to read many rows of data from database
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		<h1>See the PHP code</h1>
	</body>
</html>
