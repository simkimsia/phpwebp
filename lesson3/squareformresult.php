<?php

	/**
	* 
	* ALWAYS do the logic codes above the html display
	*
	**/
	
	// Set default radius
	$length = 0;
	
	
	// check if user arrives here via a POSTBACK
	if (!empty($_POST)) {

		// check for existent of $_POST['radius']
		if (!empty($_POST['length'])) {
			
			$length = $_POST['length'];
			
		} // end if $_POST['length'] is NOT empty
		
	} // end if user arrives here via a POSTBACK
	
	
	// calculate the area and perimeter
	$area = $length * $length;
	$perimeter = 4 * $length;
	
	
	$newTitle = 'Square - Length:' . $length . 'cm Area:' . $area . 'cm square Perimeter:' . $perimeter . 'cm';
	/**
	* 
	* ALWAYS do the html display below the logic codes
	*
	**/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			<?php echo $newTitle; ?>
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		Length : <?php echo $length; ?> cm<br />
		Area : <?php echo $area; ?> cm square<br />
		Perimeter : <?php echo $perimeter; ?> cm<br />
		
		<a href="squareform.php">Back to square form</a><br />
		<a href="index.php">Back to index</a><br />
	</body>
</html>
