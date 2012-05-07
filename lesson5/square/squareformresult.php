<?php

	/**
	* 
	* ALWAYS do the logic codes above the html display
	*
	**/
	
	// Set default length
	$length = 0;
	
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

		$lengthNotGiven = empty($_POST['length']);
		
		// if length is NOT given
		if ($lengthNotGiven) {
			
			// we add new error into $errors
			$errors[] = "Length is not given";
			
		} // end if length NOT given
		

		$lengthNotANumber = !is_numeric($_POST['length']);

		// if length is NOT a number
		if ($lengthNotANumber) {
			
			// we add new error into $errors
			$errors[] = "Length is not a number";
			
		} // end if length NOT a number



		/** end of validation **/
		
		
		/** @NEW
		*
		* Part 2  proceed as normal if no errors
		***/
		$noErrors = (count($errors) == 0);
		
		
		if ($noErrors) {
			
			if (!empty($_POST['length'])) {
				$length = $_POST['length'];
			} // end if length NOT empty

		} // end if no errors
		
		/** end of proceed as normal **/
		
	} // end if user arrives here via a POSTBACK
	
	if ($noErrors) {
		// calculate the area and perimeter
		$area =  $length * $length;
		$perimeter = 4 * $length;


		$newTitle = 'Square - Length:' . $length . 'cm Area:' . $area . 'cm square Perimeter:' . $perimeter . 'cm';
		
		$message = "\t\t" . '<font color="green">Success!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Length : ' . $length . ' cm<br />' . "\n";
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
		
		<a href="squareform.php">Back to square form</a><br />
		<a href="../index.php">Back to Lesson 5 index</a><br />
	</body>
</html>
