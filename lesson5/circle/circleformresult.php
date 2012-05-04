<?php

	/**
	* 
	* ALWAYS do the logic codes above the html display
	*
	**/
	
	// Set default radius
	$radius = 0;
	
	// @NEW Set default message
	$message = '';
	
	// @NEW Set array of errors
	$errors = array();
	
	// @NEW Set default that there is no errors
	$noErrors = true;
	
	// @NEW store !empty($_POST) into a more readable variable
	$userArriveBySubmittingAForm = !empty($_POST);
	
	// check if user arrives here via a POSTBACK
	if ($userArriveBySubmittingAForm) {

		/** @NEW 
		* 
		* Part 1 validation
		*
		***/

		$radiusNotANumber = !is_numeric($_POST['radius']);

		// if radius is NOT a number
		if ($radiusNotANumber) {
			
			// we add new error into $errors
			$errors[] = "Radius is not a number";
			
		} // end if radius NOT a number

		/** end of validation **/
		
		
		/** @NEW
		*
		* Part 2  proceed as normal if no errors
		***/
		$noErrors = (count($errors) == 0);
		
		
		if ($noErrors) {
			
			if (!empty($_POST['radius'])) {
				$radius = $_POST['radius'];
			} // end if radius NOT empty

		} // end if no errors
		
		/** end of proceed as normal **/
		
	} // end if user arrives here via a POSTBACK
	
	if ($noErrors) {
		// calculate the area and perimeter
		$constantPI = 3.14;
		$area = $constantPI * $radius * $radius;
		$perimeter = 2 * $constantPI * $radius;


		$newTitle = 'Circle - Radius:' . $radius . 'cm Area:' . $area . 'cm square Perimeter:' . $perimeter . 'cm';
		
		$message = "\t\t" . '<font color="green">Success!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Radius : ' . $radius . ' cm<br />' . "\n";
		$message = $message . "\t\t" . 'Area : ' . $area . ' cm square<br />' . "\n";
		$message = $message . "\t\t" . 'Perimeter : ' . $perimeter . ' cm<br />' . "\n";
				
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
		
		<a href="circleform.php">Back to circle form</a><br />
		<a href="../index.php">Back to Lesson 5 index</a><br />
	</body>
</html>
