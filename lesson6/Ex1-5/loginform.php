<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>
			Login Page
		</title>
	</head>
	<body>
		<form action="loginformresult.php" method="post">
			<table cellpadding="0" cellspacing="0" style="width: 100%; height: 100px;">
				<tr>
					<td style="width: 100%; height: 20%;">
						<h1 style="vertical-align: middle; text-align: center">
							Welcome to Temasek IT School
						</h1>
					</td>
				</tr>
				<tr>
					<td style="width: 100%; height: 70%;">
						<h2>
							Login Page
						</h2>
						<p>
							Please login using your email and password.
						</p><b>Login:</b>
						<p>
							<b>Email:</b> <input type="text" name="email" size="20" maxlength="40">
						</p>
						<p>
							<b>Password:</b> <input type="password" name="password" size="20" maxlength="20">
						</p>
						<div align="left">
							<input type="submit" name="submit" value="Login"> <input type="reset" value="Reset"><br>
							<br>
							Not registered? Click <a href="registerform.php">here</a>
						</div>
					</td>
				</tr>
				<tr>
					<td style="width: 100%; height: 10%;">
						Copyright <?php echo date('Y'); ?> by Temasek Informatics &amp; IT School. All rights reserved.
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
