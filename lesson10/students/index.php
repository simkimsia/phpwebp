<?php

	// the file that contains your database credentials like username and password
	require_once('config/database.php');
	
	// see Lecture Webp_Week10b11_Using_PHPandMySQL(Query).pptx Slide 8 aka Step 1
	$mysqli = new mysqli($database_hostname, $database_username, $database_password, $database_name) or exit("Error connecting to database"); 
	
	// Slide 9 aka Step 2
	$stmt = $mysqli->prepare("SELECT * FROM `lesson10_students`"); 

	// Slide 10 aka Step 3
	// no placeholder ? in step 2 means we no need Step 3

	// Slide 11 aka Step 4
	$stmt->execute(); 

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
	while ($stmt->fetch()) {
		// adding the fetched results one by one using the while loop
		$students[$id] = array(
			'id' => $id,
			'name' => $name,
			'gpa' => $gpa,
			'image' => $image
		);
	}

	// SLide 14 aka Step 7
	$stmt->close();
	
	// SLide 15 aka Step 8
	$mysqli->close();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			List of students
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		<h1>All students</h1>
		<table>
			<?php foreach($students as $key => $student) : ?>
				<?php
				
				// here we pick out the values we need
				$name = $student['name'];
				$image = $student['image'];
				$id = $student['id'];
				$viewUrl = 'studentview.php?id=' . $id;
				$deleteUrl = 'studentdelete.php?id=' . $id;				
				
				?>
				
			<tr>
				<td>
					<img width="200" height="200" src="<?php echo $image; ?>" /><br />
					<?php echo $name; ?>
				</td>
				<td>
					<a href="<?php echo $viewUrl; ?>">View </a> | <a href="<?php echo $deleteUrl; ?>">Delete</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</body>
</html>
