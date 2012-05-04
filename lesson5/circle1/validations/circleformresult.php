<?php

	/**
	* 
	* this file contains validation logic
	*
	* we want to check for radius
	*
	**/
		
	// store !empty($_POST) into a more readable variable
	$userArriveBySubmittingAForm = !empty($_POST);
	
	// check if user arrives here via a POSTBACK
	if ($userArriveBySubmittingAForm) {

		/** 
		* 
		* Part 1 validation
		*
		***/

		$radiusNotANumber = !is_numeric($_POST['radius']);

		// if radius is NOT a number
		if ($radiusNotANumber) {
			
			// we add new error into $errors
			$errors[] = "Radius is not a number";
			
		} // end if radius NOT a number

		/** end of validation **/
		
		
		/** @NEW
		*
		* Part 2  proceed as normal if no errors
		***/
		$noErrors = (count($errors) == 0);
		
		
		if ($noErrors) {
			
			if (!empty($_POST['radius'])) {
				$radius = $_POST['radius'];
			} // end if radius NOT empty

		} // end if no errors
		
		/** end of proceed as normal **/
		
	} // end if user arrives here via a POSTBACK
	
	
?>