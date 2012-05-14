<?php

	/**
	* 
	* ALWAYS do the logic codes above the html display
	*
	**/
	
	// @NEW Set default values 
	$name 		= '';
	$password 	= '';
	$gender 	= '';
	$diploma 	= '';
	$email 		= '';
	$contactno 	= '';	
	$interests	= array();
	$comments = '';
	
	// @NEW set default error messages
	$nameError 		= '';
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
	
	
	// for successful POST
	if ($noErrors && $userArriveBySubmittingAForm) {
		
		// $newTitle for successful
		// @TODO code expected here
		
		
		// @TODO code expected here
		// $h1Title for Thank you for registering with us!
		
		
		$message = "\t\t" . '<font color="green">Success!</font><br />' . "\n";
		
		$message = $message . "\t\t" . 'Name : ' . $name . ' <br />' . "\n";
		// @TODO code expected here for email, gender, diploma, contactno
		
		$message = $message . "\t\t" . 'Interests : <br />' . "\n";
		$message = $message . "\t\t" . '<ol>' . "\n";		

		// foreach loop to iterate the interests array
		// @TODO code expected here

		$message = $message . "\t\t" . '</ol>' . "\n";
		
		$message = $message . "\t\t" . 'Description : ' . $comments . ' <br />' . "\n";		

				
	// for error validation
	} else if ($haveErrors && $userArriveBySubmittingAForm) {
		// $newTitle for successful
		// @TODO code expected here
		
		
		// @TODO code expected here
		// $h1Title for Registration fail!
		
		$message = "\t\t" . '<font color="red">Fail!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Validation errors : <br />' . "\n";
		
		$message = $message . "\t\t" . '<ol>' . "\n";
		
		
		
		foreach ($errors as $key=>$errorMessage) {
			$message = $message . "\t\t\t" . '<li>' . $errorMessage . '</li>' . "\n";
			
			if ($key == 'name') {
				$nameError = $errorMessage;
			}
			
			// @TODO code expected here for passwordError
			
			// @TODO code expected here for contactnoError
			
			// @TODO basically all the errors defined in lines20-26
			
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
						<?php ?>
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
								<b>Sex:</b> <input type="radio" name="sex" value="Male" <?php if ($gender == 'Male') echo 'checked'; ?>> Male <input type="radio" name="sex" value="Female" <?php 			// @TODO code expected here to check the radio when Female chosen ?>> Female
								<font color="red"><?php 			// @TODO code expected here echo what error message? ?></font>
							</p>
							<p>
								<b>Email:</b> <input type="text" name="email" size="20" maxlength="80" >									
								<font color="red"><?php 			// @TODO code expected here echo what error message? ?></font>
							</p>
							<p>
								<b>Password:</b> <input type="password" name="password" size="20" maxlength="80" >								<font color="red"><?php // @TODO code expected here echo what error message? ?></font>
							</p>
							<p>
								<b>Contact Number:</b> <input type="text" name="contactno" size="10" maxlength="15" value="<?php echo $contactno; ?>">								<font color="red"><?php // @TODO code expected here echo what error message? ?></font>
							</p>
						</fieldset>
						<fieldset>
							<legend>Please tell us about your interests &amp; hobbies:</legend>
							<p>
								<font color="red"><?php // @TODO code expected here echo what error message?; ?></font><br />
								<b>Interests:</b> 
								<input type="checkbox" name="interests[]" value="Music" <?php if (in_array('Music', $interests)) echo 'checked'; ?>> Music 
								<input type="checkbox" name="interests[]" value="Movies" <?php // @TODO code expected here to check the box when MOvies selected ?>> Movies 
								<input type="checkbox" name="interests[]" value="Books" > Books 
								<input type="checkbox" name="interests[]" value="Napping" > Napping 
								<input type="checkbox" name="interests[]" value="Computer Games" > Computer games
								

							</p>
							<p>
								<font color="red"><?php echo $diplomaError; ?></font><br />
								<b>First choice in Diploma:</b> <select size="1" name="diploma">
									<option value="">
										--Please select--
									</option>
									<option value="Diploma in IT" <?php if ($diploma == 'Diploma in IT') echo 'selected'; ?>>
										Diploma in IT
									</option>
									<option value="Diploma in Internet and Multimedia Design" <?php if ($diploma == 'Diploma in Internet and Multimedia Design' || $diploma == '') echo 'selected'; ?>>
										Diploma in Internet and Multimedia Design
									</option>
									<option value="Diploma in Mobile and Wireless Computing" <?php // @TODO code expected here to select the dropdown? ?>>
										Diploma in Mobile and Wireless Computing
									</option>
									<option value="Diploma in Financial Business Informatics" >
										Diploma in Financial Business Informatics
									</option>
									<option value="Diploma in Cyber and Digital Security" >
										Diploma in Cyber and Digital Security
									</option>
									<option value="Diploma in Game and Entertainment Technology" >
										Diploma in Game and Entertainment Technology
									</option>
								</select>
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
						Copyright <?php echo date('Y'); ?> by Temasek Informatics &amp; IT School. All rights reserved.
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
