<?php
	require_once('config/database.php');
	
	$studentToDisplay = array();

	// we need to know what student id was used to display the details
	$studentID = $_GET['id']; 

	// now we get an array of all the possible ids
	$allIDs = array_keys($students);
	
	// now we check if the studentID exists
	$isIDValid = in_array($studentID, $allIDs);
	
	
	if ($isIDValid) {
		$studentToDisplay = $students[$studentID];
		
		$newTitle = 'Student View - ' . $studentToDisplay['name'] . ' ' . $studentToDisplay['id'];

		$h1 = $studentToDisplay['name'] . ' ' . $studentToDisplay['id'];
		

		
		$image = '<img src="' . $studentToDisplay['image'] . '" />';
		$gpa = $studentToDisplay['GPA'];
		$name = $studentToDisplay['name'];
		$id = $studentToDisplay['id'];
				
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
		
		
		<form action="studentedit.php" method="post">
		<table>
			<tr>
				<td><strong>Profile: </strong></td>
				<td><?php echo $image; ?></td>
			</tr>
			<tr>
				<td><strong>ID: </strong></td>
				<td><?php echo $id; ?></td>
			</tr>
			<tr>
				<td><strong>Name: </strong></td>
				<td><?php echo $name; ?></td>
			</tr>
			<tr>
				<td><strong>GPA: </strong></td>
				<td><?php echo $gpa; ?></td>
			</tr>									
		</table>
		</form>
		
		<br />
		<a href="index.php">Back to index</a><br />
	</body>
</html>