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
	// @TODO code expected here
	$userArriveBySubmittingAForm = !empty($_POST);
	
	// @NEW user arrives by GET
	// @TODO code expected here
	$userArriveByClickingOrDirectlyTypeURL = !$userArriveBySubmittingAForm;
	
	// check if user arrives here via a POSTBACK
	if ($userArriveBySubmittingAForm) {

		/** @NEW 
		* 
		* Part 1 validation
		*
		***/

		// check for password don't match happy
		// @TODO code expected here
		$passwordNotMatch = ('happy' != $_POST['password']);
		
		// check for email don't match john@gmail.com
		// @TODO code expected here
		$emailNotMatch = ('john@gmail.com' != $_POST['email']);

		// if email or password don't match
		if ($passwordNotMatch || $emailNotMatch) {
			
			// @TODO code expected here
			$errors[] = 'Login fail. Wrong email or password';
			
		} // end if email or password don't match

		/** end of validation **/
		
		
		/** @NEW
		*
		* Part 2  proceed as normal if no errors
		***/
		$noErrors = (count($errors) == 0);
		
		//@NEW haveErrors is the opposite of noErrors
		// @TODO code expected here
		$haveErrors = !$noErrors;
		
		// we have no use for email and password after successfully login, so we do not need to extract the values from login form
		
		/** end of proceed as normal **/
		
	} // end if user arrives here via a POSTBACK
	
	// for successful POST
	if ($noErrors && $userArriveBySubmittingAForm) {

		// @NEW we will redirect user to loginformresult.php if successful
		// @TODO code expected here
		header('Location: loginformresult.php');
				
	// for error validation
	} else if ($haveErrors && $userArriveBySubmittingAForm) {
		// $newTitle here
		// @TODO code expected here
		$newTitle = 'Error!';
		
		//  put the h1 first for message
		$message = '';
		
		$message = $message . "\t\t" . '<font color="red">Fail!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Validation errors : <br />' . "\n";
		
		$message = $message . "\t\t" . '<ol>' . "\n";
		
		// loop through the $errors array to display the error messages
		// @TODO code expected here
		foreach($errors as $key=>$error) {
			$message = $message . "\t\t\t" . '<li>' . $error . '</li>' . "\n";			
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
		<title>
			Login Page
		</title>
	</head>
	<body>
		
		
		<form action="loginform.php" method="post">
			<table cellpadding="0" cellspacing="0" style="width: 100%; height: 100px;">
				<tr>
					<td style="width: 100%; height: 20%;">
						<h1 style="vertical-align: middle; text-align: center">
							Welcome to Temasek IT School
						</h1>
					</td>
				</tr>
				<tr>
					<td style="width: 100%; height: 70%;">
						<h2>
							Login Page
						</h2>
						
						<p>
							Please login using your email and password.
						</p><b>Login:</b>
						<?php echo $message; ?>
						<p>
							<b>Email:</b> <input type="text" name="email" size="20" maxlength="40">
						</p>
						<p>
							<b>Password:</b> <input type="password" name="password" size="20" maxlength="20">
						</p>
						<div align="left">
							<input type="submit" name="submit" value="Login"> <input type="reset" value="Reset"><br>
							<br>
							Not registered? Click <a href="registerform.php">here</a>
						</div>
					</td>
				</tr>
				<tr>
					<td style="width: 100%; height: 10%;">
						Copyright <?php echo date('Y'); ?> by Temasek Informatics &amp; IT School. All rights reserved.
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
