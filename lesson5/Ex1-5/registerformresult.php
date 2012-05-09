<?php

	/**
	* 
	* ALWAYS do the logic codes above the html display
	*
	**/
	
	// Set default radius
	$name 		= '';
	$password 	= '';
	$gender 	= '';
	$diploma 	= '';
	$email 		= '';
	$contactno 	= '';	
	$interests	= array();
	$comments = '';
	
	
	// Set default message
	$message = '';
	
	// Set array of errors
	$errors = array();
	
	// @NEW Set default that there is no errors
	$noErrors = true;
	
	// validation logic
	require_once('validations/registerformresult.php');
	
	if ($noErrors) {

		$newTitle = 'Registration Result: Success!!';
		
		$h1Title = 'Thank you for registering with us!';
		
		$message = "\t\t" . '<font color="green">Success!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Name : ' . $name . ' <br />' . "\n";
		$message = $message . "\t\t" . 'Email : ' . $email . ' <br />' . "\n";		
		$message = $message . "\t\t" . 'Contact No : ' . $contactno . ' <br />' . "\n";
		$message = $message . "\t\t" . 'Gender : ' . $gender . ' <br />' . "\n";
		
		$message = $message . "\t\t" . 'Diploma : '. $diploma . '<br />' . "\n";		
		
		$message = $message . "\t\t" . 'Interests : <br />' . "\n";
		$message = $message . "\t\t" . '<ol>' . "\n";		
		foreach ($interests as $key=>$interest) {
			$message = $message . "\t\t\t" . '<li>' . $interest . '</li>' . "\n";
		}
		$message = $message . "\t\t" . '</ol>' . "\n";
		
		$message = $message . "\t\t" . 'Description : ' . $comments . ' <br />' . "\n";
				
	} else {
		$newTitle = 'Registration Result: Error! Validation failed!!';
		
		$h1Title = 'Registration Fail!';
		
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
		<title>
			<?php echo $newTitle; ?>
		</title>
	</head>
	<body>

		<h1>
			<?php echo $h1Title; ?>

		</h1>
		
		<?php echo $message; ?>
	</body>
</html>
