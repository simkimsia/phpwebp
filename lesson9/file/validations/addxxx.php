<?php
// store !empty($_POST) into a more readable variable	
$userArriveBySubmittingAForm = !empty($_POST);	

$userArriveByDirectlyClickingUrl = !$userArriveBySubmittingAForm;

// check if user arrives here via a POSTBACK	
if ($userArriveBySubmittingAForm) {		

	$subjectNotGiven = empty($_POST['subject']);		

	if ($subjectNotGiven) {			

		$errors['subject'] = "Subject is required";		
	} 
	
	
	require_once('fileupload.php');
	
	$errors = array_merge($errors, $fileErrorMessages); // we are combining all the error messages into 1 array
	
	$noErrors = (count($errors) == 0);	
	$haveErrors = !$noErrors;	
	
	if ($noErrors) {			
		if (!empty($_POST['subject'])) {				
			$subject = $_POST['subject'];			
		} // end if subject NOT empty		

	} // end if no errors		
}

?>