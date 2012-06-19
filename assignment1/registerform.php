<?php

	/**
	* 
	* ALWAYS do the logic codes above the html display
	*
	**/
	
	// @NEW Set default values 
	$userid		= '';
	$name 		= '';
	$password 	= '';
	$retype		= '';
	$gender 	= '';
	$diploma 	= '';
	$email 		= '';
	$contactno 	= '';	
	$interests	= array();
	$comments = '';
	
	// @NEW set default error messages
	$nameError 		= '';
	$retypepasswordError 	= '';
	$passwordError 	= '';
	$genderError 	= '';
	$diplomaError 	= '';
	$emailError 		= '';
	$contactnoError 	= '';	
	$interestsError		= '';

	
	
	// Set default message
	$message = '';
	
	// Set array of errors
	$errors = array();
	
	// Set default that there is no errors
	$noErrors = true;
	
	// haveErrors is the opposite of noErrors
	$haveErrors = !$noErrors;
	
	// use require_once to include the validations/registerformresult.php
	// @TODO code expected here
	require_once('validations/registerformresult.php');
	
	
	// for successful POST
	if ($noErrors && $userArriveBySubmittingAForm) {
		
		// $newTitle for successful
		// @TODO code expected here
		$newTitle = 'Success!';
		
		// @TODO code expected here
		// $h1Title for Thank you for registering with us!
		$h1Title = 'Thank you for registering with us!';
		
		$message = "\t\t" . '<font color="green">Success!</font><br />' . "\n";
		
		$message = $message . "\t\t" . 'Name : ' . $name . ' <br />' . "\n";
		// @TODO code expected here for email, gender, diploma, contactno
		$message = $message . "\t\t" . 'Gender : ' . $gender . ' <br />' . "\n";
		$message = $message . "\t\t" . 'Diploma : ' . $diploma . ' <br />' . "\n";
		$message = $message . "\t\t" . 'Contact no : ' . $contactno . ' <br />' . "\n";

		
		$message = $message . "\t\t" . 'Interests : <br />' . "\n";
		$message = $message . "\t\t" . '<ol>' . "\n";		

		// foreach loop to iterate the interests array
		// @TODO code expected here
		// @TODO code expected here
		foreach($interests as $key=>$interest) {
			$message = $message . "\t\t\t" . '<li>' . $interest . '</li>' . "\n";			
		}

		$message = $message . "\t\t" . '</ol>' . "\n";
		
		$message = $message . "\t\t" . 'Description : ' . $comments . ' <br />' . "\n";		

				
	// for error validation
	} else if ($haveErrors && $userArriveBySubmittingAForm) {
		// $newTitle for successful
		// @TODO code expected here
		$newTitle = 'Error!';
		
		// @TODO code expected here
		// $h1Title for Registration fail!
		$h1Title = 'Registration fail! Error!';
		
		$message = "\t\t" . '<font color="red">Fail!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Validation errors : <br />' . "\n";
		// @TODO code expected here
		
		$message = $message . "\t\t" . '<ol>' . "\n";
		
		
		
		foreach ($errors as $key=>$errorMessage) {
			$message = $message . "\t\t\t" . '<li>' . $errorMessage . '</li>' . "\n";
			
			if ($key == 'name') {
				$nameError = $errorMessage;
			}
			
			// @TODO code expected here for passwordError
			if ($key == 'password') {
				$passwordError = $errorMessage;
			}


			// @TODO code expected here for passwordError
			if ($key == 'retype') {
				$retypepasswordError = $errorMessage;
			}

			// @TODO code expected here for contactnoError
			if ($key == 'contactno') {
				$contactnoError = $errorMessage;
			}
			// @TODO basically all the errors defined in lines20-26
			if ($key == 'email') {
				$emailError = $errorMessage;
			}
			// @TODO code expected here for contactnoError
			if ($key == 'diploma') {
				$diplomaError = $errorMessage;
			}
			
			if ($key == 'interests') {
				$interestsError = $errorMessage;
			}
			
			if ($key == 'gender') {
				$genderError = $errorMessage;
			}
		}
		
		$message = $message . "\t\t" . '</ol>' . "\n";		

	// for displaying form
	} else if ($userArriveByClickingOrDirectlyTypeURL) { // we put the original form inside the $message variable
		$newTitle = 'Registration';
		
		$h1Title = 'Welcome to Temasek IT School';
		
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
			<?php echo $newTitle; ?>
		</title>
	</head>
	<body>
		<form action="registerform.php" method="post">
			<input type="hidden" name="formSubmitted" value="true">
			<table cellpadding="0" cellspacing="0" style="width: 100%; height: 100px;">
				<tr>
					<td style="width: 100%; height: 20%;">
						<h1 style="vertical-align: middle; text-align: center">
							<?php echo $h1Title; ?>
						</h1>
					</td>
				</tr>
				<tr>
					<td style="width: 100%; height: 70%;">
						
						<?php echo $message; ?>
						<?php if ($haveErrors || $userArriveByClickingOrDirectlyTypeURL) : ?>
						<h2>
							Visitor Registration Page
						</h2>
						<p>
							Thank you for your visit! Please register with us to get notifications of updates with IIT school.
						</p>
						<fieldset>
							<legend>Enter your information in the form below:</legend>
							<p>
								<b>Name:</b> <input type="text" name="name" size="20" maxlength="40" value="<?php echo $name; ?>">
								<font color="red"><?php echo $nameError; ?></font>
							</p>
							<p>
								<b>Sex:</b> <input type="radio" name="sex" value="Male" <?php if ($gender == 'Male') echo 'checked'; ?>> Male <input type="radio" name="sex" value="Female" <?php if ($gender == 'Female') echo 'checked'; ?>> Female
								<font color="red"><?php 	echo $genderError;		// @TODO code expected here echo what error message? ?></font>
							</p>
							<p>
								<b>Email:</b> <input type="text" name="email" size="20" maxlength="80" >									
								<font color="red"><?php 	echo $emailError;		// @TODO code expected here echo what error message? ?></font>
							</p>
							<p>
								<b>Password:</b> <input type="password" name="password" size="20" maxlength="80" >								<font color="red"><?php echo $passwordError; // @TODO code expected here echo what error message? ?></font>
							</p>
							<p>
								<b>ReType Password:</b> <input type="password" name="retype" size="20" maxlength="80" >								<font color="red"><?php echo $retypepasswordError; // @TODO code expected here echo what error message? ?></font>
							</p>
							<p>
								<b>Contact Number:</b> <input type="text" name="contactno" size="10" maxlength="15" value="<?php echo $contactno; ?>">								<font color="red"><?php echo $contactnoError;  // @TODO code expected here echo what error message? ?></font>
							</p>
						</fieldset>
						<fieldset>
							<legend>Please tell us about your interests &amp; hobbies:</legend>
							<p>
								<font color="red"><?php echo $interestsError; // @TODO code expected here echo what error message?; ?></font><br />
								<b>Interests:</b> 
								<input type="checkbox" name="interests[]" value="politics" <?php if (in_array('politics', $interests)) echo 'checked'; ?>> politics 
								<input type="checkbox" name="interests[]" value="fashion" <?php if (in_array('fashion', $interests)) echo 'checked'; ?>> fashion 
								<input type="checkbox" name="interests[]" value="inspiration" <?php if (in_array('inspiration', $interests)) echo 'checked'; ?>> inspiration 
								<input type="checkbox" name="interests[]" value="sports" <?php if (in_array('sports', $interests)) echo 'checked'; ?>> sports 
								<input type="checkbox" name="interests[]" value="finance" <?php if (in_array('finance', $interests)) echo 'checked'; ?>> finance
								

							</p>
							<p>
							</p>
							<p>
								<b>Please enter any other Comments you may have:</b><br>
								<textarea name="comments" rows="5" cols="60"><?php echo $comments; // @TODO notice how i set sticky for textarea ? ?></textarea>
							</p>
						</fieldset>
						<div align="center">
							<input type="submit" name="submit" value="Register me!"> <input type="reset" value="Reset">
						</div>
					</td>
					<?php endif; ?>
				</tr>
				<tr>
					<td style="width: 100%; height: 10%;">
						Copyright <?php echo date('Y'); ?> by HongLim Park. All rights reserved.
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
