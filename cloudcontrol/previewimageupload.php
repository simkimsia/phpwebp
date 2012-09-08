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
    <link href="archive.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<title>SpreeMachine</title>
	<style type="text/css">
	      body {
	        padding-top: 60px;
	        padding-bottom: 40px;
	      }
	    </style>
	
	
		<style>
				#drop-area {
					height: 50px;
					text-align: center;
					border: 2px dashed #ddd;
					padding: 10px;
					margin-bottom: 2em;
				}

				#drop-area .drop-instructions {
					display: block;
					height: 30px;
				}

				#drop-area .drop-over {
					display: none;
					font-size: 25px;
					height: 30px;
				}

				#drop-area.over {
					background: #ffffa2;
					border: 2px dashed #000;
				}

				#drop-area.over .drop-instructions {
					display: none;
				}

				#drop-area.over .drop-over {
					display: block;
				}

				#drop-area.over .drop-over {
					display: block;
					font-size: 25px;
				}


				#file-list {
					list-style: none;
					margin-bottom: 3em;
				}

				#file-list li {
					border-bottom: 1px solid #000;
					margin-bottom: 0.5em;
					padding-bottom: 0.5em;
				}

				#file-list li.no-items {
					border-bottom: none;
				}

				#file-list div {
					margin-bottom: 0.5em;
				}

				#file-list li img {
					max-width: 400px;
				}

				#file-list .progress-bar-container {
					width: 400px;
					height: 10px;
					border: 1px solid #555;
					margin-bottom: 20px;
				}

				#file-list .progress-bar-container.uploaded {
					height: auto;
					border: none;
				}

				#file-list .progress-bar {
					width: 0;
					height: 10px;
					font-weight: bold;
					background: #6787e3;
				}

				#file-list .progress-bar-container.uploaded .progress-bar{
					display: inline-block;
					width: auto;
					color: #6db508;
					background: transparent;
				}
				
				.sneaks {width:350px;height:70px;padding:10px;border:1px solid #aaaaaa;}
			</style>
<!--		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
		-->
		<script class="jsbin" src="js/jquery-ui.1.8.0.min.js"></script>
		<script class="jsbin" src="js/jquery.1.8.1.min.js"></script>		
	<!-- Date: 2012-09-01 -->
	<script>
	
	</script>
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
	
	
		<!--
		<div id="testdiv" class="brick photo" draggable="true">
			<img src="images/html5dragdrop01.png" width="150" height="100"  />
			<div class="overlay">
				<a class="btn-close" href="#">close<span></span></a>				
                <div class="inner">
                    <div class="date">Sep 5th</div>
                    <div class="notes">45 notes</div>                                
				</div>
			</div>
		</div>		

		<div id="testdiv1" class="brick photo" draggable="true" >
			<img src="images/mask.jpeg" width="150" height="100"  />
			<div class="overlay">
				<a class="btn-close" href="#">close<span></span></a>				
                <div class="inner">
                    <div class="date">Sep 5th</div>
                    <div class="notes">45 notes</div>                                
				</div>
			</div>
		</div>		
		<div style="position:absolute; top:250px;">this one is for making copies like sneaks
		<div id="div2" class="sneaks" ondrop="handleDropCopy(event)"
		ondragover="handleDragOver(event)"></div>

		<div style="position:absolute; top:250px; left:200px;">this one is for clipping away the original ones
		<div id="div1" class="sneaks" ondrop="handleDropCover(event)" 
		ondragover="handleDragOver(event)"></div>
		
		</div>
		-->
		
		<p>
						<input id="files-upload" type="file" multiple>
					</p>
					<p id="drop-area">
						<span class="drop-instructions">or drag and drop files here</span>
						<span class="drop-over">Drop files here!</span>
					</p>

					<ul id="file-list">
						<li class="no-items">(no files uploaded yet)</li>
					</ul>
					
					
					
					<p>
						<a href="#" class="tryagain">Rearrange</a>
					</p>
					<table style="position:relative; top:100px;">
						<tr>

							<td>
					this one is for making copies like sneaks
					<div id="div2" class="sneaks" ondrop="handleDropCopy(event)"
					ondragover="handleDragOver(event)"></div>
					</td>
					<td>
					this one is for clipping away the original ones
					<div id="div1" class="sneaks" ondrop="handleDropCover(event)" 
					ondragover="handleDragOver(event)"></div>
					</td>
					</tr>
					</table>
								

					
	</div>
					<script>
					var dragSrcEl = null;
					var dragImgSrc = null;
					var dragDivId = null;
					
					function handleDrop(e) {
					  // this/e.target is current target element.

					  if (e.stopPropagation) {
					    e.stopPropagation(); // Stops some browsers from redirecting.
					  }

					  // Don't do anything if dropping the same column we're dragging.
					  if (dragSrcEl != this) {
					    // Set the source column's HTML to the HTML of the column we dropped on.
					    dragSrcEl.innerHTML = this.innerHTML;
					    this.innerHTML = e.dataTransfer.getData('text/html');
					
						$('a.btn-close').on('click', function(e) {
							$(this).closest('div.brick').remove();
					    });
					
						$(this).trigger('mouseup');
						$(dragSrcEl).trigger('mouseup');
					  }

					  return false;
					}

					function handleDropCover(e) {
					  // this/e.target is current target element.

					  if (e.stopPropagation) {
					    e.stopPropagation(); // Stops some browsers from redirecting.
					  }

						e.target.appendChild(dragSrcEl);
						$(dragSrcEl).trigger('mouseup');

					  return false;
					}

					
					function handleDragOver(e) {
					  if (e.preventDefault) {
					    e.preventDefault(); // Necessary. Allows us to drop.
					  }

					  e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.

					  return false;
					}

					function handleDragStart(e) {
						dragSrcEl = this;

						  e.dataTransfer.effectAllowed = 'copyMove';
						  e.dataTransfer.setData('text/html', this.innerHTML);
					}
				
					
					function runRearrange() {
						
						// Get the list items and setup an array for sorting
						  var arrangeable_imgs = $("img.arrangeable");
						  var vals = [];
						


						// Populate the array
						for(var i = 0, l = arrangeable_imgs.length; i < l; i++) {
						//	alert(arrangeable_imgs[i].attr('width'));
							vals.push($(arrangeable_imgs[i]).attr('src'));
						}
						
						// reverse the order    
						for(var i = 0, l = arrangeable_imgs.length; i < l; i++) {
							var newCounter = l - i - 1;

							$(arrangeable_imgs[i]).attr('src', vals[newCounter]);
						}
						

					}
					
					var divs = document.querySelectorAll('.brick');
					[].forEach.call(divs, function(div) {
						
						div.addEventListener('dragstart', handleDragStart, false);
						 
						  div.addEventListener('dragover', handleDragOver, false);
						 
						  div.addEventListener('drop', handleDrop, false);
						 
					});
						
					
						function handleDropCopy(e)
						{
							
							// this/e.target is current target element.

						  if (e.stopPropagation) {
						    e.stopPropagation(); // Stops some browsers from redirecting.
						  }

							var div = document.createElement("div");
							div.className = "brick";
							div.classList.add("photo");
							div.innerHTML = e.dataTransfer.getData("text/html");
							e.target.appendChild(div);
							
							$('a.btn-close').on('click', function(e) {
								$(this).closest('div.brick').remove();
						    });
							
							
						  return false;
						  

						}



						var fileCounter = 0;

						
						
						(function () {
							
							
							
							
							var filesUpload = document.getElementById("files-upload"),
								dropArea = document.getElementById("drop-area"),
								fileList = document.getElementById("file-list");

							function uploadFile (file) {
								var li = document.createElement("li"),
									div = document.createElement("div"),
									img,
									progressBarContainer = document.createElement("div"),
									progressBar = document.createElement("div"),
									reader,
									xhr,
									fileInfo;

								li.appendChild(div);
								
								

								progressBarContainer.className = "progress-bar-container";
								progressBar.className = "progress-bar";
								progressBarContainer.appendChild(progressBar);
								li.appendChild(progressBarContainer);

								/*
									If the file is an image and the web browser supports FileReader,
									present a preview in the file list
								*/
								if (typeof FileReader !== "undefined" && (/image/i).test(file.type)) {
									img = document.createElement("img");
									img.className = "arrangeable";
									
									var imgdiv = document.createElement("div");
									imgdiv.draggable = true;
								
									
									imgdiv.className = "brick";
									imgdiv.className = imgdiv.className + " photo";
									
									imgdiv.addEventListener('mousedown', function grab(ev) {
										this.classList.add("grabbed");
								    });

									imgdiv.addEventListener('mouseup', function letgo(ev) {
										this.classList.remove("grabbed");
								    });
									
									
									var overlaydiv = document.createElement("div");
									overlaydiv.className = "overlay";
									
									var closelink = document.createElement("a");
									closelink.innerHTML = "close<span></span>";
									closelink.className = "btn-close";									
									closelink.href = "#";
									
									closelink.addEventListener('click', function(e) {
										$(this).closest('div.brick').remove();
								    });
									
									var innerdiv = document.createElement("div");
									innerdiv.className = "inner";
									
									var datediv = document.createElement("div");
									
									datediv.className = "date";
									datediv.innerHTML = "Sept 5th";
									
									var notesdiv = document.createElement("div");
									notesdiv.className = "notes";
									notesdiv.innerHTML = "45 notes";
									
									innerdiv.appendChild(datediv);
									innerdiv.appendChild(notesdiv);
									overlaydiv.appendChild(closelink);
									overlaydiv.appendChild(innerdiv);
									
									imgdiv.appendChild(overlaydiv);
									
									imgdiv.id = "img" + fileCounter;
									fileCounter = fileCounter + 1;
									
									imgdiv.addEventListener('dragstart', handleDragStart, false);

									imgdiv.addEventListener('dragover', handleDragOver, false);

									imgdiv.addEventListener('drop', handleDrop, false);

									
									imgdiv.appendChild(img);
									li.appendChild(imgdiv);
									/* add the image to supposed display area */
									//dropArea.appendChild(img);
									
									reader = new FileReader();
									reader.onload = (function (theImg) {
										return function (evt) {
											theImg.src = evt.target.result;
											theImg.height = 212.708;
											theImg.width = 150.361;

										};
									}(img));
									
									reader.readAsDataURL(file);
								}

								// Uploading - for Firefox, Google Chrome and Safari
								
								xhr = new XMLHttpRequest();

								// Update progress bar
								xhr.upload.addEventListener("progress", function (evt) {
									if (evt.lengthComputable) {
										progressBar.style.width = (evt.loaded / evt.total) * 100 + "%";
									}
									else {
										// No data to calculate on
									}
								}, false);

								// File uploaded
								xhr.addEventListener("load", function () {
									progressBarContainer.className += " uploaded";
									progressBar.innerHTML = "Uploaded!";
								}, false);

								xhr.open("post", "upload/upload.php", true);

								// Set appropriate headers
								xhr.setRequestHeader("Content-Type", "multipart/form-data");
								xhr.setRequestHeader("X-File-Name", file.fileName);
								xhr.setRequestHeader("X-File-Size", file.fileSize);
								xhr.setRequestHeader("X-File-Type", file.type);

								// Send the file (doh)
								xhr.send(file);
								
								
								// Present file info and append it to the list of files
								fileInfo = "<div><strong>Name:</strong> " + file.name + "</div>";
								fileInfo += "<div><strong>Size:</strong> " + parseInt(file.size / 1024, 10) + " kb</div>";
								fileInfo += "<div><strong>Type:</strong> " + file.type + "</div>";
								div.innerHTML = fileInfo;

								fileList.appendChild(li);
							}

							function traverseFiles (files) {
								if (typeof files !== "undefined") {
									for (var i=0, l=files.length; i<l; i++) {
										uploadFile(files[i]);
									}
								}
								else {
									fileList.innerHTML = "No support for the File API in this web browser";
								}	
							}

							filesUpload.addEventListener("change", function () {
								traverseFiles(this.files);
							}, false);

							dropArea.addEventListener("dragleave", function (evt) {
								var target = evt.target;

								if (target && target === dropArea) {
									this.className = "";
								}
								evt.preventDefault();
								evt.stopPropagation();
							}, false);

							dropArea.addEventListener("dragenter", function (evt) {
								this.className = "over";
								evt.preventDefault();
								evt.stopPropagation();
							}, false);

							dropArea.addEventListener("dragover", function (evt) {
								evt.preventDefault();
								evt.stopPropagation();
							}, false);

							dropArea.addEventListener("drop", function (evt) {
								traverseFiles(evt.dataTransfer.files);
								this.className = "";
								evt.preventDefault();
								evt.stopPropagation();
							}, false);	
							
							
							
																
						})();
					</script>
	
	    <!-- Le javascript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
		<script src="js/bootstrap.min.js"></script>
		<script src="overlay.js"></script>				
</body>
</html>
