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
		
		$passwordNotSame = ($_POST['password'] != $_POST['retype']);

		// if password not same
		if ($passwordNotSame) {
			
			// we add new error into $errors
			$errors['retype'] = "Password must be at least 8 characters long";
			
		} // end if 
		
		// @TODO code expected here validations such as contactno, sex radio buttons, interests checkbox, diploma dropdown, email textbox,
		$genderNotSelected = empty($_POST['sex']);

		// if gender not selected
		if ($genderNotSelected) {
			
			// we add new error into $errors
			$errors['gender'] = "Please select a gender";
			
		} // end if gender not selected
		
		$interestsNotSelected = empty($_POST['interests']);

		// if interest not selected
		if ($interestsNotSelected) {
			
			// we add new error into $errors
			$errors['interests'] = "Please select at least one interest";
			
		} // end if insteres not selected
		
		$diplomaNotSelected = empty($_POST['diploma']);

		// if diploma not selected
		if ($diplomaNotSelected) {
			
			// we add new error into $errors
			$errors['diploma'] = "Please select first choice for diploma";
			
		} // end if year of study not selected
		
		$emailNotGiven = empty($_POST['email']);

		// if email not selected
		if ($emailNotGiven) {
			
			// we add new error into $errors
			$errors['email'] = "Email is required";
			
		} // end if email not selected		
		
		$contactNotGiven = empty($_POST['contactno']);

		// if contact no not given
		if ($contactNotGiven) {
			
			// we add new error into $errors
			$errors['contactno'] = "Contact no is required";
			
		} // end if contact not given
		


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
		if (!empty($_POST['password'])) {
			$password = $_POST['password'];
		} // end if password NOT empty
		
		if (!empty($_POST['retype'])) {
			$retypepassword = $_POST['retype'];
		} // end if password NOT empty


		if (!empty($_POST['sex'])) {
			$gender = $_POST['sex'];
		} // end if sex NOT empty
		
		
		
		if (!empty($_POST['contactno'])) {
			$contactno = $_POST['contactno'];
		} // end if contactno NOT empty
		
		
		if (!empty($_POST['email'])) {
			$email = $_POST['email'];
		} // end if email NOT empty
		

		if (!empty($_POST['diploma'])) {
			$diploma = $_POST['diploma'];
		} // end if diploma NOT empty


		
		if (!empty($_POST['interests']) && is_array($_POST['interests'])) {
			$interests = $_POST['interests'];
		} // end if hobbies NOT empty
		
		if (!empty($_POST['comments'])) {
			$comments = $_POST['comments'];
		} // end if description NOT empty
		

		
		/** end of proceed as normal **/
		
	} // end if user arrives here via a POSTBACK
	
	
?>