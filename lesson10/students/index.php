<?php
	
	$students = array(
		'A001' => array(
			'id'	=> 'A001',
			'url' 	=> 'studentview.php?id=A001',
			'name' 	=> 'Charles Xavier',
			'GPA'	=> 1.5,
			'image'	=> 'images/xavier.jpg'
		),
		'A002' => array(
			'id'	=> 'A002',
			'url' 	=> 'studentview.php?id=A002',
			'name' 	=> 'Erik Magnus Lensherr',
			'GPA'	=> 2.7,
			'image'	=> 'images/erik.jpeg'
		),
		'A003' => array(
			'id'	=> 'A003',
			'url' 	=> 'studentview.php?id=A003',
			'name' 	=> 'Jean Grey',
			'GPA'	=> 4.0,
			'image' => 'images/jean.jpeg'
		),
	);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			List of students
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		<h1>All students</h1>
		<table>
			<?php foreach($students as $key => $student) : ?>
			<tr>
				<td>
					<img width="200" height="200" src="<?php echo $student['image']; ?>" /><br />
					<?php echo $student['name']; ?>
				</td>
				<td>
					<a href="<?php echo $student['url']; ?>">View </a> | <a href="deletestudent.php?id=<?php echo $student['id']; ?>">Delete</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</body>
</html>
