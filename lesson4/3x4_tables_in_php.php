<?php

/**
* 
* ALWAYS do the logic codes above the html display
*
**/

	$htmlStringForTable = ''; // empty string as default
	
	$htmlStringForTable = "\t" . '<table border="1">' . "\n"; // first put in the table opening tag
	
	$rows = 100;
	$cols = 100;
	
	// now we build row by row
	for($row = 1; $row <= $rows; $row++) {
		
		//$row will be 1, 2, 3, ...
		// until $row is > $rows then the loop will stop
		$htmlStringForTable = $htmlStringForTable . "\t\t" . '<tr>' . "\n"; // put in tr opening tag
		
		for($col = 1; $col <= $cols; $col++) {
			$htmlStringForTable = "\t\t\t" . $htmlStringForTable . '<td>'; // put in td opening tag
			$htmlStringForTable = $htmlStringForTable . 'row ' . $row; // put in values inside cell
			$htmlStringForTable = $htmlStringForTable . ' col ' . $col; // put in values inside cell
			$htmlStringForTable = $htmlStringForTable . '</td>' . "\n"; // put in td closing tag
		}
		
		
		$htmlStringForTable = $htmlStringForTable . "\t\t" . '</tr>' . "\n"; // put in tr opening tag		
		
	}
	
	$htmlStringForTable = $htmlStringForTable . "\t" . '</table>'; // put in table closing tag

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
			3 rows 4 cols Tables in PHP
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		<?php echo $htmlStringForTable; ?>
	</body>
</html>
