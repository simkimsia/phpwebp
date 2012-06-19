<?php


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



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>
			HOng Lim Park
		</title>
		<meta name="author" content="kim sia"><!-- Date: 2012-04-30 -->
	</head>
	<body>
		<h1>Hong Lim Park</h1>
		<ul>
			<li>
				<ol>
					<?php foreach($speeches as $key => $speech) : ?>
						<li>
							<img src="<?php echo $speech['image']; ?>" />
							<a href="<?php echo $speech['url']; ?>">View <?php echo $student['subject']; ?></a> 
						</li>
					<?php endforeach; ?>
				</ol>
			</li>
			
		</ul>
	</body>
</html>
