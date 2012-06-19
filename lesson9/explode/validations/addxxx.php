<?php

// store !empty($_POST) into a more readable variable	
$userArriveBySubmittingAForm = !empty($_POST);	

$userArriveByDirectlyClickingUrl = !$userArriveBySubmittingAForm;

// check if user arrives here via a POSTBACK	
if ($userArriveBySubmittingAForm) {		

	$keywordsNotGiven = empty($_POST['keywords']);		

	if ($keywordsNotGiven) {			

		$errors['keyword'] = "Select at least 1 keyword";		
	} 
	
	$noErrors = (count($errors) == 0);	
	$haveErrors = !$noErrors;	
	
	if ($noErrors) {	
		
		// this is how we convert the non default keywords into an array
		if (!empty($_POST['nondefault'])) {
			$nondefaultKeywords = explode(",", $_POST['nondefault']);			
		} // end if

				
		if (!empty($_POST['keywords'])) {				
			$keywords = $_POST['keywords'];			
		} // end if
		
		// combine the two keyword array and remove any duplicate keywords
		$keywords = array_unique(array_merge($keywords, $nondefaultKeywords));

	} // end if no errors		
}

?>