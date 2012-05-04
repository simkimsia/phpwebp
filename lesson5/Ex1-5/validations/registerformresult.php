<?php

	/**
	* 
	* this file contains validation logic
	*
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
		
		$nameNotGiven = empty($_POST['name']);

		// if name not given
		if ($nameNotGiven) {
			
			// we add new error into $errors
			$errors[] = "Name is required";
			
		} // end if name not given

		

		/** end of validation **/
		
		
		/** @NEW
		*
		* Part 2  proceed as normal if no errors
		***/
		$noErrors = (count($errors) == 0);
		
		
		if ($noErrors) {
			
			if (!empty($_POST['name'])) {
				$name = $_POST['name'];
			} // end if name NOT empty


			

		} // end if no errors
		
		/** end of proceed as normal **/
		
	} // end if user arrives here via a POSTBACK
	
	
?>