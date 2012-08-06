<?php 

	$fileDirectory = dirname(__FILE__); // this gives us the path to file folder
	$imagesDirectory = $fileDirectory . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;
		
	$newName = '';
	$newGPA = '';
	$newFileName = uniqid();
	
	$fileError = '';
	$nameError = '';
	$gpaError = '';
	
	$message = '';
	$errors = array();

	$noErrors=true;
	$haveErrors=!$noErrors;
	
	require_once('validations/addstudent.php');

	// successful add new student
	if ($noErrors && $userArriveBySubmittingAForm) {
		
		// we call the code that will CREATE a new student
		require_once('studentinsertdatabase.php');
		
		$message = "\t\t" . '<font color="green">Success!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Name : ' . $newName . ' <br />' . "\n";
		$message = $message . "\t\t" . 'GPA : ' . $newGPA . ' <br />' . "\n";
		
		$message = $message . "\t\t" . 'Image:<br />';
		
		$message = $message . '<img width="300" height="300" src="images/'.$newFileName.'" />';
		
	// not successful add new xxx
	} elseif ($haveErrors && $userArriveBySubmittingAForm) {
		
		$message = "\t\t" . '<font color="red">Fail!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Validation errors : <br />' . "\n";
		$message = $message . "\t\t" . '<ol>' . "\n";
	
		foreach ($errors as $key=>$errorMessage) {
			$message = $message . "\t\t\t" . '<li>' . $errorMessage . '</li>' . "\n";
		
			if ($key == 'file') {
				$fileError = $errorMessage;
			}	
		
			if ($key == 'name') {
				$nameError = $errorMessage;
			}	
		
			if ($key == 'gpa') {
				$gpaError = $errorMessage;
			}				
		
		}
	
		$message = $message . "\t\t" . '</ol>' . "\n";	
		
	// directly reach this form
	} elseif ($userArriveByDirectlyClickingUrl) {
		
 		$message=''; 
	}
	
?>
<html>
	<head>
		<title>

		</title>
	</head>
	<body>
		<?php echo $message; ?>
		<?php  if ($haveErrors || $userArriveByDirectlyClickingUrl) : ?>
		<form action="studentadd.php" method= "post" enctype="multipart/form-data">
			<p>
			Name: <input type="text" name="name" value="<?php echo $newName; ?>"><font color="red"><?php echo $nameError; ?></font>
			</p>
			<p>
			GPA: <input type="text" name="gpa" value="<?php echo $newGPA; ?>"><font color="red"><?php echo $gpaError; ?></font>
			</p>
			<p>
			Image: <input type="file" name="file"><font color="red"><?php echo $fileError; ?></font>
			</p>
			<input type="submit" name="submit" value="Add Student!"> 
		</form>
		<?php endif; ?>
		<a href="index.php">Back</a>
	</body>
</html>