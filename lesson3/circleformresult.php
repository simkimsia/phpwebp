<?php

	/**
	* 
	* ALWAYS do the logic codes above the html display
	*
	**/
	
	// Set default radius
	$radius = 0;
	
	
	// check if user arrives here via a POSTBACK
	if (!empty($_POST)) {

		// check for existent of $_POST['radius']
		if (!empty($_POST['radius'])) {
			
			$radius = $_POST['radius'];
			
		} // end if $_POST['radius'] is NOT empty
		
	} // end if user arrives here via a POSTBACK
	
	
	// calculate the area and perimeter
	$constantPI = 3.14;
	$area = $constantPI * $radius * $radius;
	$perimeter = 2 * $constantPI * $radius;
	
	
	$newTitle = 'Circle - Radius:' . $radius . 'cm Area:' . $area . 'cm square Perimeter:' . $perimeter . 'cm';
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
		Radius : <?php echo $radius; ?> cm<br />
		Area : <?php echo $area; ?> cm square<br />
		Perimeter : <?php echo $perimeter; ?> cm<br />
	</body>
</html>
