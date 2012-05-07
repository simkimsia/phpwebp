<?php


	$diplomas = array(
		'dit' => array(
			'id'	=> 'dit',
			'url' 	=> 'DipListShow.php?id=dit',
			'name' 	=> 'Diploma in IT',
			'image'	=> 'images/1.jpg',
			'color' => 'red',
		),
		'imi' => array(
			'id'	=> 'imi',
			'url' 	=> 'DipListShow.php?id=imi',
			'name' 	=> 'Diploma in Internet and Multimedia Design',
			'image'	=> 'images/2.jpg',
			'color' => 'green',
		),
		'mwi' => array(
			'id'	=> 'mwi',
			'url' 	=> 'DipListShow.php?id=mwi',
			'name' 	=> 'Diploma in Mobile and Wireless',
			'image'	=> 'images/3.jpg',
			'color' => 'orange',
		),
		'fbi' => array(
			'id'	=> 'fbi',
			'url' 	=> 'DipListShow.php?id=fbi',
			'name' 	=> 'Diploma in Financial Business Informatics',
			'image'	=> 'images/4.jpg',
			'color' => 'purple',
		),	
		'cds' => array(
			'id'	=> 'cds',
			'url' 	=> 'DipListShow.php?id=cds',
			'name' 	=> 'Diploma in  Cyber and Digital Security',
			'image'	=> 'images/5.jpg',
			'color' => 'blue',
		),
		'get' => array(
			'id'	=> 'get',
			'url' 	=> 'DipListShow.php?id=get',
			'name' 	=> 'Diploma in Gaming and Entertainment Technology',
			'image'	=> 'images/6.jpg',
			'color' => 'pink',
		),		
	);




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>
			Temasek Informatics &amp; IT School
		</title>
	</head>
	<body>
		<table cellpadding="0" cellspacing="0" style="width: 100%; height: 100px;">
			<tr>
				<td style="width: 100%; height: 20%;">
					<h1 style="vertical-align: middle; text-align: center">
						Welcome to Temasek Informatics &amp; IT School
					</h1>
				</td>
			</tr>
			<tr>
				<td style="width: 100%; height: 70%;">
					Please choose a diploma you are interested in:<br>
					<ul>

					</ul>
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
