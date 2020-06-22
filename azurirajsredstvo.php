<?php
include 'includes/dbconn.php';
session_start();
if(isset($_POST['azurirajBtn']))
{	
	$new_value = $_POST['iznos'];
	$sredstvo_id = $_SESSION['sid'];

	if(!empty($new_value) && is_numeric($new_value))
	{
		$update_query = "UPDATE sredstva SET iznos = '$new_value' WHERE sredstva_id = '$sredstvo_id'";
		if(mysqli_query($conn, $update_query))
		{
			header("Location: sredstva.php");
		}
		else
		{
			echo "Error";
		}
	}
	else
	{
		echo "Vrijednost unosa mora biti broj";
	}

}



?>