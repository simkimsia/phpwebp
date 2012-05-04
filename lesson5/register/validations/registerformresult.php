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

		$nameLessThan8Letters = (strlen($_POST['name']) < 8);

		// if name less than 8 letters
		if ($nameLessThan8Letters) {
			
			// we add new error into $errors
			$errors[] = "Name must be at least 8 letters";
			
		} // end if name less than 8 letters
		
		
		$mobileNotNumber = !is_numeric($_POST['mobile']);

		// if mobile not a number
		if ($mobileNotNumber) {
			
			// we add new error into $errors
			$errors[] = "Mobile must consist of only digits";
			
		} // end if mobile not a number
		
		$genderNotSelected = empty($_POST['gender']);

		// if gender not selected
		if ($genderNotSelected) {
			
			// we add new error into $errors
			$errors[] = "Please select a gender";
			
		} // end if gender not selected
		
		$diplomaNotSelected = empty($_POST['diplomas']);

		// if diploma not selected
		if ($diplomaNotSelected) {
			
			// we add new error into $errors
			$errors[] = "Please select at least one diploma";
			
		} // end if diploma not selected
		
		$yearStudyNotSelected = empty($_POST['year_study']);

		// if year of study not selected
		if ($yearStudyNotSelected) {
			
			// we add new error into $errors
			$errors[] = "Please select year of study";
			
		} // end if year of study not selected
		
		$hobbyNotSelected = empty($_POST['hobbies']);

		// if hobby not selected
		if ($hobbyNotSelected) {
			
			// we add new error into $errors
			$errors[] = "Please select at least one hobby";
			
		} // end if hobby not selected		
		
		

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


			if (!empty($_POST['mobile'])) {
				$mobile = $_POST['mobile'];
			} // end if mobile NOT empty


			if (!empty($_POST['gender'])) {
				$gender = $_POST['gender'];
			} // end if gender NOT empty


			if (!empty($_POST['diplomas']) && is_array($_POST['diplomas'])) {
				$diplomas = $_POST['diplomas'];
			} // end if diploma NOT empty


			if (!empty($_POST['year_study'])) {
				$year_study = $_POST['year_study'];
			} // end if year_study NOT empty
			
			
			if (!empty($_POST['hobbies']) && is_array($_POST['hobbies'])) {
				$hobbies = $_POST['hobbies'];
			} // end if hobbies NOT empty
			
			if (!empty($_POST['description'])) {
				$description = $_POST['description'];
			} // end if description NOT empty
			

		} // end if no errors
		
		/** end of proceed as normal **/
		
	} // end if user arrives here via a POSTBACK
	
	
?>