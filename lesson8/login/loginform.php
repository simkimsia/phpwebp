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
	
	// Set default that there is no errors
	$noErrors = true;
	
	//@NEW haveErrors is the opposite of noErrors
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
	
	// @NEW user arrives by GET
	$userArriveByClickingOrDirectlyTypeURL = !$userArriveBySubmittingAForm;
	
	// check if user arrives here via a POSTBACK
	if ($userArriveBySubmittingAForm) {

		/** @NEW 
		* 
		* Part 1 validation
		*
		***/

		$passwordNotMatch = ('happy' != $_POST['password']);
		$emailNotMatch = ('john@gmail.com' != $_POST['email']);

		// if email or password don't match
		if ($passwordNotMatch || $emailNotMatch) {
			
			$errors[] = "Login Fail. Please try again.";
			
		} // end if email or password don't match

		/** end of validation **/
		
		
		/** @NEW
		*
		* Part 2  proceed as normal if no errors
		***/
		$noErrors = (count($errors) == 0);
		
		//@NEW haveErrors is the opposite of noErrors
		$haveErrors = !$noErrors;
		
		
		// we have no use for email and password after successfully login, so we do not need to extract the values from login form
		
		/** end of proceed as normal **/
		
	} // end if user arrives here via a POSTBACK
	
	// for successful POST
	if ($noErrors && $userArriveBySubmittingAForm) {

		// @NEW we will redirect user to another webpage if successful
		header('Location: somesillyfile.php');
		
				
	// for error validation
	} else if ($haveErrors && $userArriveBySubmittingAForm) {
		$newTitle = 'Error! Validation failed!!';
		
		// @NEW put the h1 first for message
		$message = '';
		
		$message = $message . "\t\t" . '<font color="red">Fail!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Validation errors : <br />' . "\n";
		
		$message = $message . "\t\t" . '<ol>' . "\n";
		
		
		foreach ($errors as $key=>$errorMessage) {
			$message = $message . "\t\t\t" . '<li>' . $errorMessage . '</li>' . "\n";
			
		}
		
		$message = $message . "\t\t" . '</ol><br /><br />' . "\n";
		
	
		

	// for displaying form
	} else if ($userArriveByClickingOrDirectlyTypeURL) { //@NEW we put the original form inside the $message variable
		$newTitle = 'Login Form';
		
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
		
		<h1>Login Form <font color="red">with Validation</font> <font color="blue">POSTBACK To itself</font></h1>
		<h2>Email: john@gmail.com Password: happy</h2>
		
		
		<?php echo $message; ?>
		
		<!-- POSTBACK to itself. so the action is loginform.php -->
		<form action="loginform.php" method="post">
			Email    : <input type="text" name="email" /> <br />
			Password : <input type="text" name="password" /> <br />
			<input type="submit" value="Submit Form">
		</form>
	</body>
</html>
