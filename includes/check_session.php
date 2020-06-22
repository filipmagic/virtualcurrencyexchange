<?php
	include 'includes/dbconn.php';
	session_start();
		if(!isset($_SESSION['prijavljen']) && $_SESSION['prijavljen'] == false)
		{
			header("Location:prijava.php");
		}
		


?>