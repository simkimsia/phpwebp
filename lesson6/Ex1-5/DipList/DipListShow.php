<?php


	$diplomas = array();



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>
			<?php echo $newTitle; ?>
		</title>
	</head>
	<body>
		<table cellpadding="0" cellspacing="0" style="width: 100%; height: 100px;">
			<tr>
				<td style="width: 100%; height: 20%;">
					<h1 style="vertical-align: middle; text-align: center">
						Welcome to Temasek IT School
					</h1>
				</td>
			</tr>
			<tr>
				<td style="width: 100%; height: 70%;">
					<?php echo $image; ?>
				</td>
			</tr>
			<tr>
				<td style="width: 100%; height: 70%;">
					<?php echo $title; ?>
				</td>
			</tr>			
			<tr>
				<td style="width: 100%; height: 10%;">
					Copyright <?php echo date('Y'); ?> by Temasek Informatics &amp; IT School. All rights reserved.
				</td>
			</tr>
		</table>
	</body>
</html>
