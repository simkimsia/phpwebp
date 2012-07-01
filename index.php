<?php


$lessons = array(
	3,4,5,6,7,8,9
);
$assignments = array(
	1
);





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			WElcome to PHPWEBP 
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		<h1>Lessons</h1>
		<ul>
			<?php foreach ($lessons as $lesson) : 
			 $githuburl = sprintf("https://github.com/simkimsia/phpwebp/tree/lesson%d/lesson%d/", $lesson, $lesson);
			
			?>
			<li><a href="lesson<?php echo $lesson; ?>">Demo of Lesson <?php echo $lesson; ?></a>  (code available <a href="<?php echo $githuburl; ?>login">here</a>)</li>
			<?php endforeach; ?>
		</ul>
	</body>
</html>
