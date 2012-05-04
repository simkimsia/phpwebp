<?php

	/**
	* 
	* ALWAYS do the logic codes above the html display
	*
	**/
	
	// Set default radius
	$name 		= '';
	$mobile 	= '';
	$gender 	= '';
	$diplomas 	= array();
	$year_study = '';
	$hobbies	= array();
	$description = '';
	
	
	// Set default message
	$message = '';
	
	// Set array of errors
	$errors = array();
	
	// @NEW Set default that there is no errors
	$noErrors = true;
	
	// validation logic
	require_once('validations/registerformresult.php');
	
	if ($noErrors) {

		$newTitle = 'Success!!';
		
		$message = "\t\t" . '<font color="green">Success!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Name : ' . $name . ' <br />' . "\n";
		$message = $message . "\t\t" . 'Mobile : ' . $mobile . ' <br />' . "\n";
		$message = $message . "\t\t" . 'Gender : ' . $gender . ' <br />' . "\n";
		
		$message = $message . "\t\t" . 'Diploma : <br />' . "\n";
		$message = $message . "\t\t" . '<ol>' . "\n";		
		foreach ($diplomas as $key=>$diploma) {
			$message = $message . "\t\t\t" . '<li>' . $diploma . '</li>' . "\n";
		}
		$message = $message . "\t\t" . '</ol>' . "\n";
		
		
		$message = $message . "\t\t" . 'Year of Study : ' . $year_study . ' <br />' . "\n";
		
		$message = $message . "\t\t" . 'Hobbies : <br />' . "\n";
		$message = $message . "\t\t" . '<ol>' . "\n";		
		foreach ($hobbies as $key=>$hobby) {
			$message = $message . "\t\t\t" . '<li>' . $hobby . '</li>' . "\n";
		}
		$message = $message . "\t\t" . '</ol>' . "\n";
		
		$message = $message . "\t\t" . 'Description : ' . $description . ' <br />' . "\n";
				
	} else {
		$newTitle = 'Error! Validation failed!!';
		
		$message = "\t\t" . '<font color="red">Fail!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Validation errors : <br />' . "\n";
		
		$message = $message . "\t\t" . '<ol>' . "\n";
		
		foreach ($errors as $key=>$errorMessage) {
			$message = $message . "\t\t\t" . '<li>' . $errorMessage . '</li>' . "\n";
		}
		
		$message = $message . "\t\t" . '</ol>' . "\n";
		

	}
	
	/**
	* 
	* ALWAYS do the html display below the logic codes
	*
	**/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			<?php echo $newTitle; ?>
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		<?php echo $message; ?>
		
		<a href="registerform.php">Back to register form</a><br />
		<a href="../index.php">Back to Lesson 5 index</a><br />
	</body>
</html>
