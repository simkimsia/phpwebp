<?php 

	$fileDirectory = dirname(__FILE__); // this gives us the path to file folder
	$imagesDirectory = $fileDirectory . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;

	$newFileName = 'test';

	$uploaded = isset($_POST);
	
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
	<title>SpreeMachine</title>
	<style type="text/css">
	      body {
	        padding-top: 60px;
	        padding-bottom: 40px;
	      }
	    </style>
		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	<!-- Date: 2012-09-01 -->
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

	<div class="container">
	
	<?php if ($uploaded): 
		$image = $_POST['image'];
	?>
	<p>Uploaded:</p>
	<p><img src="images/test" /></p>
	<?php endif; ?>

		<form id="form1" action="previewimageupload.php" enctype="multipart/form-data">
	        <input type='file' name="file" onchange="readURL(this);" />
	        <img id="blah" src="#" alt="your image" />
	    </form>



	</div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
	        function readURL(input) {
	            if (input.files && input.files[0]) {
	                var reader = new FileReader();

	                reader.onload = function (e) {
	                    $('#blah').attr('src', e.target.result);
	                }

	                reader.readAsDataURL(input.files[0]);
	            }
	        }
	    </script>
</body>
</html>
