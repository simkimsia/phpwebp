<?php
	
	$studentToDisplay = array();
	
	$students = array(
		'A001' => array(
			'id'	=> 'A001',
			'url' 	=> 'studentview.php?id=A001',
			'name' 	=> 'Charles Xavier',
			'GPA'	=> 1.5,
			'image'	=> 'images/xavier.jpg'
		),
		'A002' => array(
			'id'	=> 'A002',
			'url' 	=> 'studentview.php?id=A002',
			'name' 	=> 'Erik Magnus Lensherr',
			'GPA'	=> 2.7,
			'image'	=> 'images/erik.jpeg'
		),
		'A003' => array(
			'id'	=> 'A003',
			'url' 	=> 'studentview.php?id=A003',
			'name' 	=> 'Jean Grey',
			'GPA'	=> 4.0,
			'image' => 'images/jean.jpeg'
		),
	);

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
		
		
		<form action="studentedit.php" method="post"> <!--  the edit form should contain all the form elements -->
			
		<table>
			<tr>
				<td><strong>Profile: </strong></td>
				<td><?php echo $image; ?></td>
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