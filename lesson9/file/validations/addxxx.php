<?php
// store !empty($_POST) into a more readable variable	
$userArriveBySubmittingAForm = !empty($_POST);	

$userArriveByDirectlyClickingUrl = !$userArriveBySubmittingAForm;

// check if user arrives here via a POSTBACK	
if ($userArriveBySubmittingAForm) {		
/** 		* 		* Part 1 validation		*		***/		
	$subjectNotGiven = empty($_POST['subject']);		
	// if name not given		
	if ($subjectNotGiven) {			
		// we add new error into $errors			
		$errors['subject'] = "subject is required";		
	} 
	
	$bodyNotGiven = empty($_POST['body']);		
	// if name not given		
	if ($bodyNotGiven) {			
		// we add new error into $errors			
		$errors['body'] = "Body is required";		
	} 
	
	$interestsNotSelected = empty($_POST['interests']);		// if interest not selected		
	if ($interestsNotSelected) {			
		// we add new error into $errors			
		$errors['interests'] = "Please select at least one interest";		
	} // end if insteres not selected		
	
	require_once('fileupload.php');
	
	$errors = array_merge($errors, $fileErrorMessages); // we are combining all the error messages into 1 array
	
	$noErrors = (count($errors) == 0);	
	$haveErrors = !$noErrors;	
	
	if ($noErrors) {			
		if (!empty($_POST['subject'])) {				
			$subject = $_POST['subject'];			
		} // end if name NOT empty		
		
		if (!empty($_POST['body'])) {				
			$body = $_POST['body'];			
		} // end if name NOT empty			
		
		if (!empty($_POST['nondefault'])) {
			$nondefaultKeywords = explode(",", $_POST['nondefault']);
		}
		
		if (!empty($_POST['interests']) && is_array($_POST['interests'])) {				
			$interests = $_POST['interests'];			
		} // end if hobbies NOT empty
		
		// here we combine the two arrays $interests and $nondefaultKeywords into a single array
		$interests = array_unique(array_merge($interests, $nondefaultKeywords));

		if ($successfullyMoveFile) {
			$imageSource = $newFileName;
		}
	} // end if no errors		
	}

	?>