<?php

	/**
	* 
	* ALWAYS do the logic codes above the html display
	*
	**/
	
	// @NEW Set default radius as empty string
	$radius = '';
	
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

		$radiusNotANumber = !is_numeric($_POST['radius']);

		// if radius is NOT a number
		if ($radiusNotANumber) {
			
			//  we add new error into $errors but this time we state the key!
			$errors['radius'] = "Radius is not a number";
			
		} // end if radius NOT a number

		/** end of validation **/
		
		
		/** 
		*
		* Part 2  proceed as normal if no errors
		***/
		$noErrors = (count($errors) == 0);
		
		// haveErrors is the opposite of noErrors
		$haveErrors = !$noErrors;
		
		

		//@NEW we remove the if ($noErrors) because we want to display even the wrong input 
		if (!empty($_POST['radius'])) {
			$radius = $_POST['radius'];
		} // end if radius NOT empty


		
		/** end of proceed as normal **/
		
	} // end if user arrives here via a POSTBACK
	
	// for successful POST
	if ($noErrors && $userArriveBySubmittingAForm) {
		// calculate the area and perimeter
		$constantPI = 3.14;
		$area = $constantPI * $radius * $radius;
		$perimeter = 2 * $constantPI * $radius;


		$newTitle = 'Circle - Radius:' . $radius . 'cm Area:' . $area . 'cm square Perimeter:' . $perimeter . 'cm';
		
		
		//  put the h1 first for message
		$message = '
		<h1>Calculate Circle Statistics <font color="red">with Validation</font> <font color="blue"> and STICKY form</font></h1>
		';
		
		$message = $message . "\t\t" . '<font color="green">Success!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Radius : ' . $radius . ' cm<br />' . "\n";
		$message = $message . "\t\t" . 'Area : ' . $area . ' cm square<br />' . "\n";
		$message = $message . "\t\t" . 'Perimeter : ' . $perimeter . ' cm<br />' . "\n";
		
		$message = $message . '
		
		<br /><br />
		<!-- POSTBACK to itself. so the action is circle1form.php -->
		<form action="circle1form.php" method="post">
			<!--  @NEW we explicitly state the value -->
			Radius : <input type="text" name="radius" value="' . $radius . '"/> cm <br>
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
		<h1>Calculate Circle Statistics <font color="red">with Validation</font> <font color="blue"> and STICKY form</font></h1>
		';
		
		$message = $message . "\t\t" . '<font color="red">Fail!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Validation errors : <br />' . "\n";
		
		$message = $message . "\t\t" . '<ol>' . "\n";
		
		
		// radius error message
		$radiusError = '';
		
		foreach ($errors as $key=>$errorMessage) {
			$message = $message . "\t\t\t" . '<li>' . $errorMessage . '</li>' . "\n";
			
			// extract radius error message
			if ($key == 'radius') {
				$radiusError = $errorMessage;
			}
		}
		
		$message = $message . "\t\t" . '</ol><br /><br />' . "\n";
		
		$message = $message . '
		
		
		<!-- POSTBACK to itself. so the action is circle1form.php -->
		<form action="circle1form.php" method="post">
			<!-- @NEW we explicitly state the value -->
			Radius : <input type="text" name="radius" value="' . $radius . '" /> cm <font color ="red">'. $radiusError .'</font><br>
			<input type="submit" value="Submit Form">
		</form>
		
		<br />
		<a href="../index.php">Back to index</a>
		
		';
		

	// for displaying form
	} else if ($userArriveByClickingOrDirectlyTypeURL) { // we put the original form inside the $message variable
		$newTitle = 'Form to calculate circle';
		
		
		
		$message = '
		<h1>Calculate Circle Statistics <font color="red">with Validation</font> <font color="blue"> and STICKY form</font></h1>
		<!-- POSTBACK to itself. so the action is circle1form.php -->
		<form action="circle1form.php" method="post">
			Radius : <input type="text" name="radius"> cm<br>
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
