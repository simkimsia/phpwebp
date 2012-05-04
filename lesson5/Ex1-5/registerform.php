<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<title>
			Registration
		</title>
	</head>
	<body>
		<form action="registerformresult.php" method="post">
			<input type="hidden" name="formSubmitted" value="true">
			<table cellpadding="0" cellspacing="0" style="width: 100%; height: 100px;">
				<tr>
					<td style="width: 100%; height: 20%;">
						<h1 style="vertical-align: middle; text-align: center">
							Welcome to Temasek Informatics &amp; IT School
						</h1>
					</td>
				</tr>
				<tr>
					<td style="width: 100%; height: 70%;">
						<h2>
							Visitor Registration Page
						</h2>
						<p>
							Thank you for your visit! Please register with us to get notifications of updates with IIT school.
						</p>
						<fieldset>
							<legend>Enter your information in the form below:</legend>
							<p>
								<b>Name:</b> <input type="text" name="name" size="20" maxlength="40" value="">
							</p>
							<p>
								<b>Sex:</b> <input type="radio" name="sex" value="Male"> Male <input type="radio" name="sex" value="Female"> Female
							</p>
							<p>
								<b>Email:</b> <input type="text" name="email" size="20" maxlength="80" value="">
							</p>
							<p>
								<b>Password:</b> <input type="password" name="password" size="20" maxlength="80" value="">
							</p>
							<p>
								<b>Contact Number:</b> <input type="text" name="contactno" size="10" maxlength="15" value="">
							</p>
						</fieldset>
						<fieldset>
							<legend>Please tell us about your interests &amp; hobbies:</legend>
							<p>
								<b>Interests:</b> <input type="checkbox" name="interests[]" value="Music"> Music <input type="checkbox" name="interests[]" value="Movies"> Movies <input type="checkbox" name="interests[]" value="Books"> Books <input type="checkbox" name="interests[]" value="Napping"> Napping <input type="checkbox" name="interests[]" value="Computer Games"> Computer games
							</p>
							<p>
								<b>First choice in Diploma:</b> <select size="1" name="diploma">
									<option value="">
										--Please select--
									</option>
									<option value="Diploma in IT">
										Diploma in IT
									</option>
									<option value="Diploma in Internet and Multimedia Design" selected>
										Diploma in Internet and Multimedia Design
									</option>
									<option value="Diploma in Mobile and Wireless Computing">
										Diploma in Mobile and Wireless Computing
									</option>
									<option value="Diploma in Financial Business Informatics">
										Diploma in Financial Business Informatics
									</option>
									<option value="Diploma in Cyber and Digital Security">
										Diploma in Cyber and Digital Security
									</option>
									<option value="Diploma in Game and Entertainment Technology">
										Diploma in Game and Entertainment Technology
									</option>
								</select>
							</p>
							<p>
								<b>Please enter any other Comments you may have:</b><br>
								<textarea name="comments" rows="5" cols="60"></textarea>
							</p>
						</fieldset>
						<div align="center">
							<input type="submit" name="submit" value="Register me!"> <input type="reset" value="Reset">
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
