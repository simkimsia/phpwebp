<?php
	$url = $_SERVER['HTTP_HOST'];

	// read more about strpos here http://php.net/manual/en/function.strpos.php
	$thisIsLocalHostUrl = (strpos($url, 'localhost') !== false);
	$thisIsCloudControlUrl = (strpos($url, 'cloudcontrolled') !== false);

	// the credentials for localhost database
	if ($thisIsLocalHostUrl) {

		$database_name = 'phpwebp_11012345a';
		$database_username = 'root';
		$database_password = null;
		$database_hostname = 'localhost';
	}
	
	// the credentials for cloudcontrol database
	if ($thisIsCloudControlUrl) {
		$database_name = '';
		$database_username = '';
		$database_password = '';
		$database_hostname = '';
	}
	

?>