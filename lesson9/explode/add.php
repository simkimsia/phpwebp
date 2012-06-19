<?php 

	$fileDirectory = dirname(__FILE__); // this gives us the path to file folder
	$lesson9Directory = dirname($fileDirectory); // this gives us the path to the lesson9 folder
	$rootDirectory = dirname($lesson9Directory); // this gives us the path to the parent folder of lesson9 folder
		
	$keywords = array();
	$nondefaultKeywords = array();
	
	$keywordError = '';
	
	$message = '';
	$errors = array();

	$noErrors = true;
	$haveErrors = !$noErrors;
	
	require_once('validations/addxxx.php');

	// successful add new xxx
	if ($noErrors && $userArriveBySubmittingAForm) {
		
		$message = "\t\t" . '<font color="green">Success!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Keywords : <ol>' . "\n";
		
		foreach($keywords as $key => $keyword) {
			$message = $message . "\t\t\t" . '<li>' . $keyword . '</li>' . "\n";			
		}

		$message = $message . "\t\t" . '</ol>' . "\n";
		
	// not successful add new xxx
	} elseif ($haveErrors && $userArriveBySubmittingAForm) {
		
		$message = "\t\t" . '<font color="red">Fail!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Validation errors : <br />' . "\n";
		$message = $message . "\t\t" . '<ol>' . "\n";
	
	foreach ($errors as $key=>$errorMessage) {
		$message = $message . "\t\t\t" . '<li>' . $errorMessage . '</li>' . "\n";
		
		if ($key == 'keyword') {
			$keywordError = $errorMessage;
		}	
		
	}
		$message = $message . "\t\t" . '</ol>' . "\n";	
		
	// directly reach this form
	} elseif ($userArriveByDirectlyClickingUrl) {
		
 		$message = ''; 
	}
	
?>
<html>
	<head>
		<title>

		</title>
	</head>
	<body>
		<?php echo $message; ?>
		<?php  if ($haveErrors || $userArriveByDirectlyClickingUrl) : ?>
		<form action="add.php" method= "post">
			<p>
			Keywords: <br />
			<input type="checkbox" value="politics" name="keywords[]" /> politics <br />
			<input type="checkbox" value="finance" name="keywords[]"/> finance <br />
			<input type="checkbox" value="sports" name="keywords[]"/> sports <br />
			<input type="checkbox" value="fashion" name="keywords[]"/> fashion <br />
			<input type="checkbox" value="inspiration" name="keywords[]"/> inspiration <br />			
			
			</p>
			<p>
			Non default keywords: (separated by commas) <input type="text" name="nondefault" size = "80"/>
			</p>
			<input type="submit" name="submit" value="Add xxx!"> 
		</form>
		<?php endif; ?>
	</body>
</html>