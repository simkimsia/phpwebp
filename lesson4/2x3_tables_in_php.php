<?php

/**
* 
* ALWAYS do the logic codes above the html display
*
**/

	$htmlStringForTable = ''; // empty string as default
	
	$htmlStringForTable = '<table border="1">' . "\n"; // first put in the table opening tag
	
	$rows = 2;
	$cols = 3;
	
	// now we build row by row
	for($row = 1; $row <= $rows; $row++) {
		
		//$row will be 1, 2, 3, ...
		// until $row is > $rows then the loop will stop
		$htmlStringForTable = $htmlStringForTable . '<tr>' . "\n"; // put in tr opening tag
		
		for($col = 1; $col <= $cols; $col++) {
			$htmlStringForTable = $htmlStringForTable . '<td>'; // put in td opening tag
			$htmlStringForTable = $htmlStringForTable . 'row ' . $row; // put in values inside cell
			$htmlStringForTable = $htmlStringForTable . ' col ' . $col; // put in values inside cell
			$htmlStringForTable = $htmlStringForTable . '</td>' . "\n"; // put in td closing tag
		} // end for loop for $cols
		
		$htmlStringForTable = $htmlStringForTable . '</tr>' . "\n"; // put in tr opening tag		
		
	} // end for loop for $rows
	
	$htmlStringForTable = $htmlStringForTable . '</table>'; // put in table closing tag

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
			2 rows 3 cols Tables in PHP
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		<?php echo $htmlStringForTable; ?>
	</body>
</html>
