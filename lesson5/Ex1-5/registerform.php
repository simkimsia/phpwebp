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
							<legend>Please tell us about your interests &amp; hobbies:</legend>
							<p>
								<b>Interests:</b> <input type="checkbox" name="interests[]" value="Music"> Music <input type="checkbox" name="interests[]" value="Movies"> Movies <input type="checkbox" name="interests[]" value="Books"> Books <input type="checkbox" name="interests[]" value="Napping"> Napping <input type="checkbox" name="interests[]" value="Computer Games"> Computer games
							</p>
							<p>
								<b>First choice in Diploma:</b> <select size="1" name="diploma">
									<option value="">
										--Please select--
									</option>
									
									<option value="Diploma in Internet and Multimedia Design" selected>
										Diploma in Internet and Multimedia Design
									</option>
									
								</select>
							</p>
							<p>
								<b>Please enter any other Comments you may have:</b><br>
								
							</p>
						</fieldset>
						<div align="center">
							<input type="submit" name="submit" value="Register me!"> 
							
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
