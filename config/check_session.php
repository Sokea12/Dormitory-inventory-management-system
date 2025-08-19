<?php 
	session_start();
	if($_SESSION['USER'] == "")
	{
		header("location:../form_login.php");
	}
?>