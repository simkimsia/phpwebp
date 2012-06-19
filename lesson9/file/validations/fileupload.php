<?php

	
	// list of possible upload error codes
	// copied from http://www.php.net/manual/en/features.file-upload.errors.php
	$uploadErrors = array( 
    UPLOAD_ERR_OK        => "No errors.", 
    UPLOAD_ERR_INI_SIZE    => "Larger than upload_max_filesize.", 
    UPLOAD_ERR_FORM_SIZE    => "Larger than form MAX_FILE_SIZE.", 
    UPLOAD_ERR_PARTIAL    => "Partial upload.", 
    UPLOAD_ERR_NO_FILE        => "No file.", 
    UPLOAD_ERR_NO_TMP_DIR    => "No temporary directory.", 
    UPLOAD_ERR_CANT_WRITE    => "Can't write to disk.", 
    UPLOAD_ERR_EXTENSION     => "File upload stopped by extension.", 
     
  	); 

  	// list of possible file types accepted
  	// here we only allow jpg and png and gif
  	$fileTypes = array(
  		'image/pjpeg',
  		'image/jpeg',
  		'image/png',
  		'image/gif'
  	);
  	
  	// default value for unsuccessful move file
  	$successfullyMoveFile = false;
  	
	// the name of the input type 
	$fileInputName = 'file';
	
	// an array to store all the possible errors related to uploading a file
	$fileErrorMessages = array();
  	
	$uploadFile = !empty($_FILES);
	
	if ($uploadFile) {
		$fileUploaded = $_FILES[$fileInputName];
		
		// if we have errors while uploading!!
		if ($fileUploaded['error'] != UPLOAD_ERR_OK) {
			$errorCode = $fileUploaded['error']; // this could be 1, 2, 3, 4, 5, 6, or 7.
			$fileErrorMessages['file'] = $uploadErrors[$errorCode];
		}
		
		// now we check for file type
		$fileTypeUploaded = $fileUploaded['type'];
		
		$fileTypeNotAllowed = !in_array($fileTypeUploaded, $fileTypes);
		if ($fileTypeNotAllowed) {
			$fileErrorMessages['file'] = 'You should upload a .jpg, .png or .gif file';
		}
		
		// if successful, we want to copy the file to our images folder
		if ($fileUploaded['error'] == UPLOAD_ERR_OK) {
			
			$successfullyMoveFile = move_uploaded_file($fileUploaded["tmp_name"], $imagesDirectory . $newFileName);
			/*
			$successfullyMoveFile = $s3->create_object($bucket, $newFileName, array(
				'fileUpload' => $fileUploaded["tmp_name"],
				'acl'	=> $s3::ACL_PUBLIC
			));
			*/
		}
	}
?>