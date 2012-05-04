<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			Form to register
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		<h1>Register Form</h1>
		<!-- WHEN user press submits, the form data will be sent to the "action" to be processed. In this case, registerformresult.php -->
		<form action="registerformresult.php" method="post">
			Name : <input type="text" name="name" /><br>
			<br>
			Mobile : <input type="text" name="mobile" /><br>
						
						<br />
						<br />
			Gender : <input type="radio" name="gender" value="Male" /> Male <input type="radio" name="gender" value="Female" /> Female <br /><br />
			
			Diploma : <input type="checkbox" name="diplomas[]" value="Diploma of IT" /> DIT
			<input type="checkbox" name="diplomas[]" value="Financial Business Informatics" /> FBI
			<input type="checkbox" name="diplomas[]" value="Diploma of Multimedia IT" /> IMI<br>
			
			Year of study : <select name="year_study">
								<option value="1">Year 1</option>
								<option value="2">Year 2</option>
								<option value="3">Year 3</option>																
							</select><br /><br />
			Hobbies: <select name="hobbies[]" multiple="multiple">
						<option value="Reading">Reading</option>
						<option value="Cycling">Cycling</option>
						<option value="Napping">Napping</option>												
					 </select><br /><br />
			
			Description (optional):<br />
			<textarea name="description" rows="10" cols="30"></textarea><br />
			<input type="submit" value="Submit Form">
		</form>
	</body>
</html>
