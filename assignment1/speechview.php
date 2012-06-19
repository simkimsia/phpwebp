<?php

	$speechToDisplay = array();
	
	$speeches = array(
		'1' => array(
			'id'	=> '1',
			'url' 	=> 'speechview.php?id=1',
			'subject' 	=> 'Neil Gaiman Commencement Speech',
			'body'	=> 'I never really expected to find myself giving advice to people graduating from an establishment of higher education.  I never graduated from any such establishment. I never even started at one. I escaped from school as soon as I could, when the prospect of four more years of enforced learning before Iíd become the writer I wanted to be was stifling.',
			'image'	=> 'images/neilgaiman.jpg',
			'tags' => 'inspiration,cool,neil gaiman'
		),
		'2' => array(
			'id'	=> '2',
			'url' 	=> 'speechview.php?id=2',
			'subject' 	=> 'I have a Dream',
			'body'	=> 'In 1950\'s America, the equality of man envisioned by the Declaration of Independence was far from a reality. People of color ó blacks, Hispanics, Asians ó were discriminated against in many ways, both overt and covert. The 1950\'s were a turbulent time in America, when racial barriers began to come down due to Supreme Court decisions, like Brown v. Board of Education; and due to an increase in the activism of blacks, fighting for equal rights.',
			'image'	=> 'images/martin.jpg',
			'tags' => 'inspiration,politics,martin luther king jr'
		),
		'3' => array(
			'id'	=> '3',
			'url' 	=> 'speechview.php?id=3',
			'subject' 	=> 'Think Different',
			'body'	=> 'Here is to the crazy ones. The rebels. The troublemakers. The ones who see things differently. While some may see them as the crazy ones, we see genius. Because the people who are crazy enough to think they can change the world, are the ones who do.',
			'image'	=> 'images/think.png',
			'tags' => 'inspiration,finance,apple,steve jobs'
		),
		'4' => array(
			'id'	=> '4',
			'url' 	=> 'speechview.php?id=4',
			'subject' 	=> 'Reception in Madras',
			'body'	=> 'In reply to the Welcome address read by Mr. G. A. Natesan on behalf of the Indian South African League, at a meeting at the Victoria Public Hall, Madras, on the 21st April 1915, with Dr. Sir Subramania Iyar in the Chair, Mr. Gandhi said - Mr. Chairman and Friends, - On behalf of my wife and myself I am deeply grateful for the great honour this you here in Madras, and may I say, this Presidency, have done to us and the affection that has been lavished upon us in this great and enlightened - not benighted - Presidency.
			',
			'image'	=> 'images/gandhi.jpg',
			'tags' => 'inspiration,politics,gandhi'
		),

	);

	// we need to know what speech id was used to display the details
	$speechID = $_GET['id']; 

	// now we get an array of all the possible ids
	$allIDs = array_keys($speeches);
	
	// now we check if the speechID exists
	$isIDValid = in_array($speechID, $allIDs);
	
	
	if ($isIDValid) {
		$speechToDisplay = $speeches[$speechID];
		
		$newTitle =  $speechToDisplay['subject'];

		$h1 = $speechToDisplay['subject'];
		

		
		$image = '<img src="' . $speechToDisplay['image'] . '" height="200" width="200"/>';
		$subject = $speechToDisplay['subject'];
		$body = $speechToDisplay['body'];
		$tags = explode(",", $speechToDisplay['tags']);
		$id = $speechToDisplay['id'];
				
	} else {
		$newTitle = 'No such speech';

		$h1 = 'No such speech';
		
		$image = '';
		$subject = '';
		$body = '';
		$tags = array();
		$id = '';
		
		
		
	}
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			<?php echo $newTitle; ?>
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		<h1>
			<?php echo $h1; ?>
		</h1>
		
		<table>
			<tr>
				<td><strong>Speech: </strong></td>
				<td><?php echo $image; ?></td>
			</tr>
			<tr>
				<td><strong>ID: </strong></td>
				<td><?php echo $id; ?></td>
			</tr>
			<tr>
				<td><strong>Subject: </strong></td>
				<td><input type="text" size="68" value="<?php echo $subject; ?>" /></td>
			</tr>
			<tr>
				<td><strong>Body: </strong></td>
				<td><textarea rows="50" cols="50"><?php echo $body; ?></textarea></td>
			</tr>
			<tr>
				<td><strong>Tags: </strong></td>
				<td>
					<?php 
					
					foreach ($tags as $key=> $tag)  {
						echo "<input type='checkbox' value='$tag' checked> $tag &nbsp;";
					}
					
					
					?>
				</td>
			</tr>
		</table>
		
		
		<br />
		<a href="home.php">Back to home</a><br />
	</body>
</html>