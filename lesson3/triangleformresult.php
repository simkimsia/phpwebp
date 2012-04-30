<?php

	/**
	* 
	* ALWAYS do the logic codes above the html display
	*
	**/
	
	// Set default base
	$length = 0;
	$base 	= 0;
	
	
	// check if user arrives here via a POSTBACK
	if (!empty($_POST)) {

		// check for existent of $_POST['radius']
		if (!empty($_POST['length'])) {
			
			$length = $_POST['length'];
			
		} // end if $_POST['length'] is NOT empty
		
		// check for existent of $_POST['base']
		if (!empty($_POST['base'])) {
			
			$base = $_POST['base'];
			
		} // end if $_POST['base'] is NOT empty
		
		
	} // end if user arrives here via a POSTBACK
	
	
	// calculate the area and perimeter
	$area 		= $length * $base * 0.5;
	
	$lengthSquare	= $length * $length;
	$baseSquare 	= $base * $base;
	
	$hypotenuse = sqrt($lengthSquare + $baseSquare);
	$perimeter 	= $hypotenuse + $base + $length;
	
	
	$newTitle = 'Triangle - Length:' . $length . 'cm Base:' . $base . ' Area:' . $area . 'cm square Perimeter:' . $perimeter . 'cm';
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
		Length : <?php echo $radius; ?> cm<br />
		Base :	<?php echo $base; ?> cm<br />
		Area : <?php echo $area; ?> cm square<br />
		Perimeter : <?php echo $perimeter; ?> cm<br />
	</body>
</html>
