<?php

	session_start();

	// default userid
	$userid = '';

	// check if visitor is logged in ?
	$loggedIn = (!empty($_SESSION['userid']));
	
	// since user is logged in, let us retrieve user's name from $_SESSION
	if ($loggedIn) {
		$userid = $_SESSION['userid'];
	} else {
		// we only allow logged in user to see this page
		// if visitor not logged in, redirect visitor to login page
		header('Location: index.php');
		exit;
	}

	
	// see Lecture Webp_Week10b11_Using_PHPandMySQL(Query).pptx Slide 8 aka Step 1
	$mysqli = new mysqli('localhost', 'root', 'password', 'labtest_exercise') or exit("Error connecting to database");
	
	// Slide 9 aka Step 2
	$stmt = $mysqli->prepare("SELECT * FROM `songs` WHERE `userid` = ?"); 

	// Slide 10 aka Step 3
	$stmt->bind_param('s', $userid);

	// Slide 11 aka Step 4
	$stmt->execute(); 

	/**
	* No. of variables MUST match no. of COLUMNS retrieved
	* Since in Step 2 we retrieved * meaning ALL the Columns
	* we need to have the same number of variables
	* Currently, lesson10_students have the following COLUMNS in this exact order

	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `title` varchar(50) NOT NULL,
	  `body` text,
	  `userid` varchar(50) NOT NULL,
	**/
	// Slide 12 aka Step 5
	$stmt->bind_result($id, $title, $body, $userid);

	// Slide 13 aka Step 6
	$students = array(); // prepare an empty array to store all the results fetched from database
	while ($stmt->fetch()) {
		// adding the fetched results one by one using the while loop
		$songs[$id] = array(
			'id' => $id,
			'title' => $title,
			'body' => $body,
			'userid' => $userid
		);
	}

	// SLide 14 aka Step 7
	$stmt->close();
	
	// SLide 15 aka Step 8
	$mysqli->close();

	$message = ''; 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			List of songs
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		<h1>All students</h1>
		<h2><?php echo $message; ?></h2>
		<table>
			<?php foreach($songs as $key => $song) : ?>
				<?php
				
				// here we pick out the values we need
				$title = $song['title'];
				$body = $song['body'];
				$id = $song['id'];
				$viewUrl = 'songview.php?id=' . $id;
				$deleteUrl = 'songdelete.php?id=' . $id;				
				
				?>
				
			<tr>
				<td>

					<?php echo $title; ?>
				</td>
				<td>
					<a href="<?php echo $viewUrl; ?>">View </a> | <a href="<?php echo $deleteUrl; ?>">Delete</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<a href="songadd.php">Add new song</a><br />
		<a href="logout.php">Logout</a>
	</body>
</html>
