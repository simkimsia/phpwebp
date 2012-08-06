<?php 
		
	$userid = '';
	$name = '';
	$password = '';
	$retypepassword = '';
	$interests = array();
	
	$userIdError = '';
	$nameError = '';
	$passwordError = '';
	$retypepasswordError = '';
	$interestsError = '';	
	
	$message = '';
	$errors = array();

	$noErrors = true;
	$haveErrors = !$noErrors;
	
	// validations to check if the registration works properly
	require_once('validations/registerformresult.php');

	// successful add new user
	if ($noErrors && $userArriveBySubmittingAForm) {
		
		// we call the code that will CREATE a new user
		require_once('userinsertdatabase.php');
		
		$message = "\t\t" . '<font color="green">Success!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Name : ' . $name . ' <br />' . "\n";
		$message = $message . "\t\t" . 'Interests : <br />' . "\n";
		$message = $message . "\t\t" . '<ol>' . "\n";		

		// foreach loop to iterate the interests array
		foreach($interests as $key=>$interest) {
			$message = $message . "\t\t\t" . '<li>' . $interest . '</li>' . "\n";			
		}

		$message = $message . "\t\t" . '</ol>' . "\n";

		
	// not successful add new xxx
	} elseif ($haveErrors && $userArriveBySubmittingAForm) {
		
		$message = "\t\t" . '<font color="red">Fail!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Validation errors : <br />' . "\n";
		$message = $message . "\t\t" . '<ol>' . "\n";
	
		foreach ($errors as $key=>$errorMessage) {
			$message = $message . "\t\t\t" . '<li>' . $errorMessage . '</li>' . "\n";
		
			if ($key == 'userid') {
				$userIdError = $errorMessage;
			}	
		
			if ($key == 'name') {
				$nameError = $errorMessage;
			}	
		
			if ($key == 'password') {
				$passwordError = $errorMessage;
			}			
			
			if ($key == 'retypepassword') {
				$retypepasswordError = $errorMessage;
			}	
			
			if ($key == 'interests') {
				$interestsError = $errorMessage;
			}
		
		}
	
		$message = $message . "\t\t" . '</ol>' . "\n";	
		
	// directly reach this form
	} elseif ($userArriveByDirectlyClickingUrl) {
		
 		$message=''; 
	}
	
?>
<html>
	<head>
		<title>

		</title>
	</head>
	<body>
		<?php echo $message; ?>
		<?php  if ($haveErrors || $userArriveByDirectlyClickingUrl) : ?>
		<form action="register.php" method= "post" >
			<p>
			UserId: <input type="text" name="userid" value="<?php echo $userid; ?>"><font color="red"><?php echo $userIdError; ?></font>
			</p>
			
			<p>
			Name: <input type="text" name="name" value="<?php echo $name; ?>"><font color="red"><?php echo $nameError; ?></font>
			</p>
			<p>
			Password: <input type="password" name="password" value="<?php echo $password; ?>"><font color="red"><?php echo $passwordError; ?></font>
			</p>
			<p>
			Retype Password: <input type="password" name="retypepassword" value="<?php echo $retypepassword; ?>"><font color="red"><?php echo $retypepasswordError; ?></font>
			</p>			
			<fieldset>
				<legend>Please tell us about your interests &amp; hobbies:</legend>
				<p>
					<font color="red"><?php echo $interestsError; ?></font><br />
					<b>Interests:</b> 
					<input type="checkbox" name="interests[]" value="Music" <?php if (in_array('Music', $interests)) echo 'checked'; ?>> Music 
					<input type="checkbox" name="interests[]" value="Movies" <?php if (in_array('Movies', $interests)) echo 'checked'; ?>> Movies 
					<input type="checkbox" name="interests[]" value="Books" <?php if (in_array('Books', $interests)) echo 'checked'; ?>> Books 
					<input type="checkbox" name="interests[]" value="Napping" <?php if (in_array('Napping', $interests)) echo 'checked'; ?>> Napping 
					<input type="checkbox" name="interests[]" value="Computer Games" <?php if (in_array('Computer Games', $interests)) echo 'checked'; ?>> Computer games
					
				</p>
			</fieldset>
			<input type="submit" name="submit" value="Register!"> 
		</form>
		<?php endif; ?>
		<a href="index.php">Back</a>
	</body>
</html>