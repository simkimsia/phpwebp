<?php 

	$fileDirectory = dirname(__FILE__); // this gives us the path to file folder
	$lesson9Directory = dirname($fileDirectory); // this gives us the path to the lesson9 folder
	$rootDirectory = dirname($lesson9Directory); // this gives us the path to the parent folder of lesson9 folder
	$imagesDirectory = $fileDirectory . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;
	
	require_once $rootDirectory . DIRECTORY_SEPARATOR . 'aws_sdk' . DIRECTORY_SEPARATOR . 'sdk.class.php';
	$s3 = new AmazonS3();
	$bucket = 'phpwebp';
	
	$subject = '';

	$newFileName = uniqid();
	
	$fileError = '';
	$subjectError = '';
	
	$message='';
	$errors=array();

	$noErrors=true;
	$haveErrors=!$noErrors;
	
	require_once('validations/addxxx.php');

	// successful add new xxx
	if ($noErrors && $userArriveBySubmittingAForm) {
		
		$message = "\t\t" . '<font color="green">Success!</font><br />' . "\n";
		$message = $message . "\t\t" . 'Subject : ' . $subject . ' <br />' . "\n";
		
		$message = $message . "\t\t" . 'Image:<br />';
		//$imageSource = $s3->get_object_url($bucket, $newFileName);
		$imageSource = 'images/' . $newFileName;
		$message = $message . '<img width="300" height="300" src="'.$imageSource.'" />';
		
	// not successful add new xxx
	} elseif ($haveErrors && $userArriveBySubmittingAForm) {
		
		$message = "\t\t" . '<font color="red">Fail!</font><br />' . "\n";
	$message = $message . "\t\t" . 'Validation errors : <br />' . "\n";
	$message = $message . "\t\t" . '<ol>' . "\n";
	
	foreach ($errors as $key=>$errorMessage) {
		$message = $message . "\t\t\t" . '<li>' . $errorMessage . '</li>' . "\n";
		
		if ($key == 'file') {
			$fileError = $errorMessage;
		}	
		
		if ($key == 'subject') {
			$subjectError = $errorMessage;
		}	
		
		
	}
		$message = $message . "\t\t" . '</ol>' . "\n";	
		
	// directly reach this form
	} elseif ($userArriveByDirectlyClickingUrl) {
		
 		$message=''; 
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
		<form action="add.php" method= "post" enctype="multipart/form-data">
			<p>
			Subject: <input type="text" name="subject">
			</p>
			<p>
			Image: <input type="file" name="file">
			</p>
			<input type="submit" name="submit" value="Add xxx!"> 
		</form>
		<?php endif; ?>
	</body>
</html>