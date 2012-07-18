<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			Welcome to CloudControl MySQL docs
		</title>
		<meta name="author" content="Nicholas Ng"><!-- Date: 2012-07-16 -->
	</head>
	<body>
		<h1>Push the downloaded sql file</h1>
		<ol>
			<li><p>Login into your adminer on cloudcontrol e.g. webp1104103e.cloudcontrolled.com/adminer/adminer.php </p></li>
				<img src="../images/mysql/dumpsqlfilestep1.png" /><br/>
			
			<li><p>Use the credentials that you got from <a href="getcreds.php">part 2</a> (Get MySQL username, password and hostname for cloudcontrol) Note: Leave "Database" BLANK</p></li>
				<img src="../images/mysql/getcreds2.png"/><br/>
				
			<li><p>Select on the correct database first!!</p></li>
			
			<li><p>Click on "SQL command"</p></li>
			<img src="../images/mysql/pushsqlstep1.png" /><br/>
			
			<li><p>Click on "choose files" and select the sql file which you dumped in the previous part</p></li>
			<img src="../images/mysql/pushsqlstep4.png" /><br/>
			
			<li><p>Click on "Execute"<p></li>
			<img src="../images/mysql/pushsqlstep5.png" /><br/>
			
		</ol>
		<a href="index.php">Back to using mysql in cloudcontrol</a>
	</body>
</html>
