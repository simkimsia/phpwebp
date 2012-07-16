<?php

// store !empty($_POST) into a more readable variable	
$userArriveBySubmittingAForm = !empty($_POST);	

$userArriveByDirectlyClickingUrl = !$userArriveBySubmittingAForm;

// check if user arrives here via a POSTBACK	
if ($userArriveBySubmittingAForm) {		

	$userIdNotGiven = empty($_POST['userid']);		

	if ($userIdNotGiven) {			

		$errors['userid'] = "UserID is required";		
	}

	$nameNotGiven = empty($_POST['name']);		

	if ($nameNotGiven) {			

		$errors['name'] = "Name is required";		
	} 

	$passwordLessThan8Characters = (strlen($_POST['password']) < 8);		

	if ($passwordLessThan8Characters) {			

		$errors['password'] = "Password is at least 8 characters long";		
	} 


	$passwordsNotMatched = ($_POST['retypepassword'] != $_POST['password']);		

	if ($passwordsNotMatched) {			

		$errors['retypepassword'] = "Passwords do not match";		
	}
	
	$interestsNotGiven = empty($_POST['interests']);		
	
	if ($interestsNotGiven) {			

		$errors['interests'] = "Select at least 1 interest";		
	}
	
	
	require_once('checkuserid.php'); // this is for checking unique user id
	
	
	$noErrors = (count($errors) == 0);	
	$haveErrors = !$noErrors;	

	if (!empty($_POST['userid'])) {				
		$userid = $_POST['userid'];			
	} // end if userid NOT empty		

	
	if (!empty($_POST['name'])) {				
		$name = $_POST['name'];			
	} // end if name NOT empty		
	
	if (!empty($_POST['password'])) {				
		$password = $_POST['password'];			
	} // end if password NOT empty
	
	if (!empty($_POST['retypepassword'])) {				
		$retypepassword = $_POST['retypepassword'];			
	} // end if retypepassword NOT empty	
	
	if (!empty($_POST['interests'])) {				
		$interests = $_POST['interests'];			
	} // end if interests NOT empty

}

?>