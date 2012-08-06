<?php
	session_start();
	
	// default user's name
	$user = '';
	
	// check if visitor is logged in ?
	$loggedIn = (!empty($_SESSION['user']));
		
	// since user is logged in, let us retrieve user's name from $_SESSION
	if ($loggedIn) {
		$user = $_SESSION['user'];
	} 
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			Welcome!! This page CAN be accessed by anonymous users
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		<h1>Welcome!! This page CAN be accessed by anonymous users</h1>
		<?php if ($loggedIn) : ?>
		<h2>Logged in as <?php echo $user; ?> | <a href="logout.php">Logout</a></h2>
		
		<?php else : ?>
		<h2>Not logged in | <a href="register.php">Signup</a> | <a href="index.php">Login</a></h2>		
		<?php endif; ?>
		<a href="private_home.php">Private page</a>
	</body>
</html>
