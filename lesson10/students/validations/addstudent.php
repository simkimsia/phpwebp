<?php

// store !empty($_POST) into a more readable variable	
$userArriveBySubmittingAForm = !empty($_POST);	

$userArriveByDirectlyClickingUrl = !$userArriveBySubmittingAForm;

// check if user arrives here via a POSTBACK	
if ($userArriveBySubmittingAForm) {		

	$nameNotGiven = empty($_POST['name']);		

	if ($nameNotGiven) {			

		$errors['name'] = "Name is required";		
	} 
	
	$gpaNotGiven = empty($_POST['gpa']);		
	
	if ($gpaNotGiven) {			

		$errors['gpa'] = "GPA is required";		
	}
	
	
	require_once('fileupload.php');
	
	$errors = array_merge($errors, $fileErrorMessages); // we are combining all the error messages into 1 array
	
	$noErrors = (count($errors) == 0);	
	$haveErrors = !$noErrors;	
	
	if (!empty($_POST['name'])) {				
		$newName = $_POST['name'];			
	} // end if subject NOT empty		
	
	if (!empty($_POST['gpa'])) {				
		$newGPA = $_POST['gpa'];			
	} // end if subject NOT empty

}

?>