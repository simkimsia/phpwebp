<?php

	/**
	* 
	* ALWAYS do the logic codes above the html display
	*
	**/
	
	// @NEW Set default length as empty string
	$length = '';
	$base = '';
	
	// Set default message
	$message = '';
	
	// Set array of errors
	$errors = array();
	
	// Set default that there is no errors
	$noErrors = true;
	
	// haveErrors is the opposite of noErrors
	$haveErrors = !$noErrors;
	
	
	/**
	 *
	 * User arrives either by POST or GET
	 * POST means user submitted a form to arrive here
	 * GET means user click on hyperlink or type url to arrive here
	 *
	 */
	
	// store !empty($_POST) into a more readable variable
	$userArriveBySubmittingAForm = !empty($_POST);
	
	//  user arrives by GET
	$userArriveByClickingOrDirectlyTypeURL = !$userArriveBySubmittingAForm;
	
	// check if user arrives here via a POSTBACK
	if ($userArriveBySubmittingAForm) {

		/**  
		* 
		* Part 1 validation
		*
		***/

		$lengthNotANumber = !is_numeric($_POST['length']);

		// if length is NOT a number
		if ($lengthNotANumber) {
			
			//  we add new error into $errors but this time we state the key!
			$errors['length'] = "Length is not a number";
			
		} // end if length NOT a number
		
		

		

		$lengthNotANumber = !is_numeric($_POST['length']);

		// if length is NOT a number
		if ($lengthNotANumber) {
			
			// we add new error into $errors
			$errors['length'] = "Length is not a number";
			
		} // end if length NOT a number
		
		$lengthNotGiven = empty($_POST['length']);
		
		// if length is NOT given
		if ($lengthNotGiven) {
			
			// we add new error into $errors
			$errors['length'] = "Length is not given";
			
		} // end if length NOT given



		
		$baseNotANumber = !is_numeric($_POST['base']);

		// if base is NOT a number
		if ($baseNotANumber) {
			
			// we add new error into $errors
			$errors['base'] = "Base is not a number";
			
		} // end if base NOT a number
		
		$baseNotGiven = empty($_POST['base']);
		
		// if base is NOT given
		if ($baseNotGiven) {
			
			// we add new error into $errors
			$errors['base'] = "Base is not given";
			
		} // end if base NOT given		

		/** end of validation **/
		
		
		/** 
		*
		* Part 2  proceed as normal if no errors
		***/
		$noErrors = (count($errors) == 0);
		
		// haveErrors is the opposite of noErrors
		$haveErrors = !$noErrors;
		
		

		//@NEW we remove the if ($noErrors) because we want to display even the wrong input 
		if (!empty($_POST['length'])) {
			$length = $_POST['length'];
		} // end if length NOT empty

		if (!empty($_POST['base'])) {
			$base = $_POST['base'];
		} // end if length NOT empty
		
		/** end of proceed as normal **/
		
	} // end if user arrives here via a POSTBACK
	
	// for successful POST
	if ($noErrors && $userArriveBySubmittingAForm) {
		// calculate the area and perimeter
		$area 		= $length * $base * 0.5;

		$lengthSquare	= $length * $length;
		$baseSquare 	= $base * $base;

		$hypotenuse = sqrt($lengthSquare + $baseSquare);
		$perimeter 	= $hypotenuse + $base + $length;


		$newTitle = 'Triangle - Length:' . $length . 'cm Area:' . $area . 'cm square Perimeter:' . $perimeter . 'cm';
		
		
		//  put the h1 first for message
		$message = '
		<h1>Calculate Triangle Statistics <font color="red">with Validation</font> <font color="blue"> and STICKY form</font></h1>
		';
		
		$message = $message . "\t\t" . '<font color="green">Success!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Length : ' . $length . ' cm<br />' . "\n";
		$message = $message . "\t\t" . 'Base : ' . $base . ' cm<br />' . "\n";
		$message = $message . "\t\t" . 'Area : ' . $area . ' cm square<br />' . "\n";
		$message = $message . "\t\t" . 'Perimeter : ' . $perimeter . ' cm<br />' . "\n";
		
		$message = $message . '
		
		<br /><br />
		<!-- POSTBACK to itself. so the action is triangleform.php -->
		<form action="triangleform.php" method="post">
			<!--  @NEW we explicitly state the value -->
			Length : <input type="text" name="length" value="' . $length . '"/> cm <br>
			Base : <input type="text" name="base" value="' . $base . '"/> cm <br>
			<input type="submit" value="Submit Form">
		</form>
		
		<br />
		<a href="../index.php">Back to index</a>
		
		';
		
		
				
	// for error validation
	} else if ($haveErrors && $userArriveBySubmittingAForm) {
		$newTitle = 'Error! Validation failed!!';
		
		//  put the h1 first for message
		$message = '
		<h1>Calculate Triangle Statistics <font color="red">with Validation</font> <font color="blue"> and STICKY form</font></h1>
		';
		
		$message = $message . "\t\t" . '<font color="red">Fail!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Validation errors : <br />' . "\n";
		
		
		
		$message = $message . "\t\t" . '<ol>' . "\n";
		
		
		// length error message
		$lengthError = '';
		
		// base error message
		$baseError = '';
		
		foreach ($errors as $key=>$errorMessage) {
			$message = $message . "\t\t\t" . '<li>' . $errorMessage . '</li>' . "\n";
			
			// extract length error message
			if ($key == 'length') {
				$lengthError = $errorMessage;
			}
			
			// extract length error message
			if ($key == 'base') {
				$baseError = $errorMessage;
			}
		}
		
		$message = $message . "\t\t" . '</ol><br /><br />' . "\n";
		
		$message = $message . '
		
		
		<!-- POSTBACK to itself. so the action is triangleform.php -->
		<form action="triangleform.php" method="post">
			<!-- @NEW we explicitly state the value -->
			Length : <input type="text" name="length" value="' . $length . '" /> cm <font color ="red">'. $lengthError .'</font><br>
			Base : <input type="text" name="base" value="' . $base . '" /> cm <font color ="red">'. $baseError .'</font><br>			
			<input type="submit" value="Submit Form">
		</form>
		
		<br />
		<a href="../index.php">Back to index</a>
		
		';
		

	// for displaying form
	} else if ($userArriveByClickingOrDirectlyTypeURL) { // we put the original form inside the $message variable
		$newTitle = 'Form to calculate triangle';
		
		
		
		$message = '
		<h1>Calculate Triangle Statistics <font color="red">with Validation</font> <font color="blue"> and STICKY form</font></h1>
		<!-- POSTBACK to itself. so the action is triangleform.php -->
		<form action="triangleform.php" method="post">
			Length : <input type="text" name="length"> cm<br>
			Base : <input type="text" name="base"> cm<br />
			<input type="submit" value="Submit Form">
		</form>
		
		<br />
		<a href="../index.php">Back to index</a>
		';
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
	</body>
</html>
