<?php
	include 'includes/dbconn.php';

	session_start();

	if(isset($_POST['tecajBtn']))
	{
		$novi_tecaj = $_POST['tecaj'];
		$valuta = $_SESSION['valuta'];

		$datum = date('Y-m-d');

		$update_query = "UPDATE valuta SET tecaj='$novi_tecaj', datum_azuriranja='$datum' WHERE valuta_id='$valuta'";

		if(!empty($novi_tecaj) && is_numeric($novi_tecaj))
		{
			mysqli_query($conn, $update_query);
			header("Location:valute.php");
		}
		else
		{
			echo "Tecaj je obavezno polje i mora biti broj";
		}
	}

?>