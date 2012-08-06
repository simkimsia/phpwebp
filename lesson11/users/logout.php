<?php
	// see webp_week15_loginsession.pptx slide 14
	session_start();
	unset($_SESSION['user']);
	session_destroy();
	header('Location: index.php');
?>