<?php
	$url = $_SERVER['HTTP_HOST'];

	// read more about strpos here http://php.net/manual/en/function.strpos.php
	$thisIsLocalHostUrl = (strpos($url, 'localhost') !== false);
	$thisIsCloudControlUrl = (strpos($url, 'cloudcontrolled') !== false);

	// the credentials for localhost database
	if ($thisIsLocalHostUrl) {

		$database_name = 'phpwebp_11012345a';
		$database_username = 'root';
		$database_password = 'password';
		$database_hostname = '127.0.0.1';
	}
	
	// the credentials for cloudcontrol database
	if ($thisIsCloudControlUrl) {
		$database_name = '';
		$database_username = '';
		$database_password = '';
		$database_hostname = '';
	}
	

?>