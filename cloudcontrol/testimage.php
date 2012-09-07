<?php 

	$fileDirectory = dirname(__FILE__); // this gives us the path to file folder
	$imagesDirectory = $fileDirectory . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;

	$newFileName = 'test';

	$uploaded = !empty($_POST);
	
	if ($uploaded) {
		require_once 'fileupload.php';
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="archive.css" rel="stylesheet">
	<title>SpreeMachine</title>
	<style type="text/css">
	      body {
	        padding-top: 60px;
	        padding-bottom: 40px;
	      }
		
	</style>
	
		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

</head>
<body>

	<div class="navbar navbar-inverse navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </a>
	      <a class="brand" href="leanpivot1.html">SpreeMachine</a>
	      <div class="nav-collapse collapse">
	        <ul class="nav">
	          <li class="active"><a href="#">Home</a></li>
	          <li><a href="leanpivot1.html">About</a></li>
              <li><a href="mailto:julia.min.lean@gmail.com">Contact</a></li>
	        </ul>
	      </div><!--/.nav-collapse -->
	    </div>
	  </div>
	</div>

	<div id="content" class="container">
		<div class="brick photo">
			<img id="ya" src="images/html5dragdrop01.png" width="150" height="100"  />
			<div class="overlay">
				<a class="btn-close" href="#">close<span></span></a>				
                <div class="inner">
                    <div class="date">Sep 5th</div>
                    <div class="notes">45 notes</div>                                
				</div>
			</div>
		</div>		
	</div>
	
	    <!-- Le javascript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
		<script src="js/bootstrap.min.js"></script>
		<script src="overlay.js"></script>		
</body>
</html>
