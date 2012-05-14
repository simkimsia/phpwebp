<?php

	/**
	* 
	* this file contains validation logic
	*
	*
	**/
		
	/**
	 *
	 * User arrives either by POST or GET
	 * POST means user submitted a form to arrive here
	 * GET means user click on hyperlink or type url to arrive here
	 *
	 */
	
	// store !empty($_POST) into a more readable variable
	$userArriveBySubmittingAForm = !empty($_POST);
	
	//  user arrives by GET
	$userArriveByClickingOrDirectlyTypeURL = !$userArriveBySubmittingAForm;
	
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
			$errors['name'] = "Name is required";
			
		} // end if name not given

		$passwordLessThan8Letters = (strlen($_POST['password']) < 8);

		// if password less than 8 letters
		if ($passwordLessThan8Letters) {
			
			// we add new error into $errors
			$errors['password'] = "Password must be at least 8 characters long";
			
		} // end if name less than 8 letters
		
		// @TODO code expected here validations such as contactno, sex radio buttons, interests checkbox, diploma dropdown, email textbox,

		/** end of validation **/
		
		
		/** @NEW
		*
		* Part 2  proceed as normal if no errors
		***/
		$noErrors = (count($errors) == 0);
		
		// haveErrors is the opposite of noErrors
		$haveErrors = !$noErrors;
		
		
			
		if (!empty($_POST['name'])) {
			$name = $_POST['name'];
		} // end if name NOT empty


		// @TODO code expected here to assign the variables in Ex1-5/registerform.php lines 10-17
		// remember that $interests is an array, so we need to check $_POST['interests'] for empty and also ????

		
		/** end of proceed as normal **/
		
	} // end if user arrives here via a POSTBACK
	
	
?>