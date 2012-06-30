<?php

	/**
	* 
	* ALWAYS do the logic codes above the html display
	*
	**/
	
	
	// Set default message
	$message = '';
	
	// Set array of errors
	$errors = array();
	
	$dropdown = '';
	
	// Set default that there is no errors
	$noErrors = true;
	
	//@NEW haveErrors is the opposite of noErrors
	$haveErrors = !$noErrors;
	
	
	// construct an array that will store all the option values in dropdown
	$animals = array(
		'1' => 'Lion',
		'2' => 'Tiger',
		'3'	=> 'Sylvester'
	);
	
	
	// set default dropdownError
	$dropdownError = '';
	
	// this means the keys are 1, 2, 3
	// this means the values are Lion, Tiger, Sylvester respectively
	
	
	/**
	 *
	 * User arrives either by POST or GET
	 * POST means user submitted a form to arrive here
	 * GET means user click on hyperlink or type url to arrive here
	 *
	 */
	
	// store !empty($_POST) into a more readable variable
	$userArriveBySubmittingAForm = !empty($_POST);
	
	// @NEW user arrives by GET
	$userArriveByClickingOrDirectlyTypeURL = !$userArriveBySubmittingAForm;
	
	// check if user arrives here via a POSTBACK
	if ($userArriveBySubmittingAForm) {

		/** @NEW 
		* 
		* Part 1 validation
		*
		***/

		$dropdownNotGiven = empty($_POST['dropdown']);

		// if dropdown is empty
		if ($dropdownNotGiven) {
			
			$errors['dropdown'] = "Not given!!";
			
		} // end if

		/** end of validation **/
		
		
		/** @NEW
		*
		* Part 2  proceed as normal if no errors
		***/
		$noErrors = (count($errors) == 0);
		
		//@NEW haveErrors is the opposite of noErrors
		$haveErrors = !$noErrors;
		
		if (!empty($_POST['dropdown'])) {
			$dropdown = $_POST['dropdown'];
		}
		
		/** end of proceed as normal **/
		
	} // end if user arrives here via a POSTBACK
	
	// for successful POST
	if ($noErrors && $userArriveBySubmittingAForm) {

		$newTitle = 'Success!!';
		
		// @NEW put the h1 first for message
		$message = '';
		
		$message = $message . "\t\t" . '<font color="green">Success!</font><br />' . "\n";
		$message = $message . "\t\t" . 'You selected ' . $animals[$dropdown] . "\n"; // note the plural $animals
		
				
	// for error validation
	} else if ($haveErrors && $userArriveBySubmittingAForm) {
		$newTitle = 'Error! Validation failed!!';
		
		// @NEW put the h1 first for message
		$message = '
		';
		
		$message = $message . "\t\t" . '<font color="red">Fail!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Validation errors : <br />' . "\n";
		
		$message = $message . "\t\t" . '<ol>' . "\n";
		
		
		foreach ($errors as $key=>$errorMessage) {
			$message = $message . "\t\t\t" . '<li>' . $errorMessage . '</li>' . "\n";
			
			
			if ($key == 'dropdown') {
				$dropdownError = $errorMessage;
			}
			
		}
		
		$message = $message . "\t\t" . '</ol><br /><br />' . "\n";
		
	
		

	// for displaying form
	} else if ($userArriveByClickingOrDirectlyTypeURL) { //@NEW we put the original form inside the $message variable
		$newTitle = 'Some form';
		
		$message = '';
		
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
		
		<h1>Stick Form <font color="red">for dropdown</font></h1>

		
		
		<?php echo $message; ?>
		
		<!-- POSTBACK to itself. so the action is form.php -->
		<form action="form.php" method="post">
			Something as dropdown: <select name="dropdown" size="1" >
			<option value="" >-- Select --</option>
			<?php foreach($animals as $key=>$animal) : ?>
				<option value="<?php echo $key; ?>"  <?php if ($dropdown == $key) echo "selected"; ?> ><?php echo $animal; ?></option>
			<?php endforeach; ?>
			</select>
			<font color="red"><?php echo $dropdownError; ?></font>
			<br />
			<input type="submit" value="Submit Form">
		</form>
	</body>
</html>
