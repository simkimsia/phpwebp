<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			Form to calculate circle
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		<h1>Calculate Circle Statistics <font color="red">with Validation!</font></h1>
		<h2><font color="blue">We separate the validation logic in circleformresult.php</font></h2>
		<!-- WHEN user press submits, the form data will be sent to the "action" to be processed. In this case, circleformresult.php -->
		<form action="circleformresult.php" method="post">
			Radius : <input type="text" name="radius"> cm<br>
			<input type="submit" value="Submit Form">
		</form>
	</body>
</html>
