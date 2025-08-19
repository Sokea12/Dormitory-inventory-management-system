<?php 
	session_start();
	session_destroy();
	header("location:dms_login.php");
	// function redirect page 
	// header("location:url_page");
?>