<?php
	session_start();

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

		// the file that contains your database credentials like username and password
		require_once('config/database.php');
	
		// see Lecture Webp_Week10b11_Using_PHPandMySQL(Query).pptx Slide 16, 17
		$mysqli = new mysqli($database_hostname, $database_username, $database_password, $database_name) or exit("Error connecting to database"); 
	
		//  STEP 2 --- notice the extra WHERE userid = ? AND password = ? --- 
		$stmt = $mysqli->prepare("SELECT * FROM `lesson11_users` WHERE `userid` = ? AND `password` = ?"); 

		// STEP 3 i is for integer, s is for string, i is a number so ss
		$stmt->bind_param("ss", $_POST['userid'], $_POST['password']); 

		// Step 4
		$stmt->execute(); 
	
		/**
		* No. of variables MUST match no. of COLUMNS retrieved
		* Since in Step 2 we retrieved * meaning ALL the Columns
		* we need to have the same number of variables
		* Currently, lesson11_users have the following COLUMNS in this exact order

		  `userid` varchar(20) NOT NULL,
		  `name` varchar(255) NOT NULL,
		  `password` varchar(255) NOT NULL,
		  `interests` varchar(255) NOT NULL,
		**/
		// Step 5
		$stmt->bind_result($userid, $name, $password, $interests);
	
		// Step 6
		$stmt->fetch(); // no need for while loop since we want to fetch just 1 row.
	
		// if $userid is empty that means the login has failed
		$loginFail = empty($userid);
	
		// Step 7 and 8
		$stmt->close();
	
		$mysqli->close();
		
		// if loginFail
		if ($loginFail) {
			
			$errors[] = "Login Fail. Please try again.";
			
		} // end if userid or password don't match

		/** end of validation **/
		
		
		/** @NEW
		*
		* Part 2  proceed as normal if no errors
		***/
		$noErrors = (count($errors) == 0);
		
		//@NEW haveErrors is the opposite of noErrors
		$haveErrors = !$noErrors;
		
		
		// we have no use for userid and password after successfully login, so we do not need to extract the values from login form
		
		/** end of proceed as normal **/
		
	} // end if user arrives here via a POSTBACK
	
	// for successful POST
	if ($noErrors && $userArriveBySubmittingAForm) {

		// successful login, so we want to store the logged in user's name into the $_SESSION
		$_SESSION['user'] = $name;

		// @NEW we will redirect user to another webpage if successful
		header('Location: public_home.php');
		
				
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
		
		<h1>Login Form <font color="red"> that talks to database</font> <font color="blue">POSTBACK To itself</font></h1>
		
		
		<?php echo $message; ?>
		
		<!-- POSTBACK to itself. so the action is loginform.php -->
		<form action="index.php" method="post">
			Userid    : <input type="text" name="userid" /> <br />
			Password : <input type="password" name="password" /> <br />
			<input type="submit" value="Submit Form">
		</form>
		<br />
		<a href="register.php">Register</a><br />
		<a href="public_home.php">Publicly accessible page</a><br />
		<a href="private_home.php">Private page</a><br />
	</body>
</html>
