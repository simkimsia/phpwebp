<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			Form to calculate triangle
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		<h1>Calculate Triangle Statistics <font color="red">with Validation!</font></h1>
		<!-- WHEN user press submits, the form data will be sent to the "action" to be processed. In this case, triangleformresult.php -->
		<form action="triangleformresult.php" method="post">
			Length : <input type="text" name="length"> cm<br />
			Base : <input type="text" name="base"> cm<br />
			<input type="submit" value="Submit Form">
		</form>
	</body>
</html>
