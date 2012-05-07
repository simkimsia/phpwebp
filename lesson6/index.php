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


	$githuburl = "https://github.com/simkimsia/phpwebp/blob/lesson6/lesson6/";



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			Lesson 6 - How to use $_GET, GET parameters and associative array
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		<h1>How to use $_GET, GET parameters and associative array</h1>
		<ul>
			<li>List of students :
				<ol>
					<?php foreach($students as $key => $student) : ?>
						<li>
							<a href="<?php echo $student['url']; ?>">View <?php echo $student['name']; ?></a>  (code available <a href="<?php echo $githuburl; ?>circle">here</a>)</li>
						</li>
					<?php endforeach; ?>
				</ol>
			</li>
			<li><a href="Ex1-5/index.php">Ex 1-5 Fix the DipListShow(TODO)</a>  (skeleton available <a href="<?php echo $githuburl; ?>Ex1-5">here</a>)</li>			
		</ul>
	</body>
</html>
