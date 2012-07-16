<?php
	// code that will update the student stats
	require_once('studentedit.php');
	
	// See Webp_Week12_UsingPHPANDMySQLQuery.pptx
	// Slide 14 Step 0
	// we need to know what student id was used to display the details
	$studentID = $_GET['id']; 

	// the file that contains your database credentials like username and password
	require_once('config/database.php');
	
	// Slide 8 aka Step 1
	$mysqli = new mysqli($database_hostname, $database_username, $database_password, $database_name) or exit("Error connecting to database"); 
	
	// Slide 9 aka Step 2 --- notice the extra WHERE id = ? --- this is how we restrict to just 1 particular student
	$stmt = $mysqli->prepare("SELECT * FROM `lesson10_students` WHERE id = ?"); 

	// Slide 10 aka Step 3
	$stmt->bind_param("d", $studentID); // i is for integer, s is for string, studentID is a number so i

	// Slide 10 aka Step 4
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
	// Slide 11 aka Step 5
	$stmt->bind_result($id, $name, $gpa, $image);
	
	// Slide 12 aka Step 6
	$stmt->fetch(); // no need for while loop since we want to fetch just 1 row.
	
	// now we check if the id is valid
	$isIDValid = !empty($id);
	
	// Slide 13 aka Step 7 and 8
	$stmt->close();
	
	$mysqli->close();
	
	if ($isIDValid) {
		// we do nothing about $id, $name, $gpa, $image since bind_result will correctly assign them
		
		$newTitle = $name; // we want to display the student name as page title
		$h1 = $id . ' ' . $name; // we want to display the student id and name as h1 title
						
	} else {
		$newTitle = 'No such student';

		$h1 = 'No such student';

		$image = '';
		$gpa = '';
		$name = '';
		$id = '';		
		
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			<?php echo $newTitle; ?>
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		<h1>
			<?php echo $h1; ?>
		</h1>
		
		
		
		<form action="studentview.php?id=<?php echo $studentID; ?>" method="post"> <!--  the edit form should contain all the form elements -->
			
		<table>
			<tr>
				<td><strong>Profile: </strong></td>
				<td><img src="images/<?php echo $image; ?>" /></td>
			</tr>
			<!-- this input type is for id . it MUST be invisible to the visitor, so we choose hidden type -->
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<tr>
				<td><strong>Name: </strong></td>
				<td><input type="text" name="name" value="<?php echo $name; ?>" /></td>
			</tr>
			<tr>
				<td><strong>GPA: </strong></td>
				<td><input type="text" name="gpa" value="<?php echo $gpa; ?>" /></td>
			</tr>									
		</table>
			
			<input type="submit" value="Update!" /><!-- this submit button must be inside the form element -->
		
		</form><!-- end of form -->
		
		<br />
		<a href="index.php">Back to index</a><br />
	</body>
</html>