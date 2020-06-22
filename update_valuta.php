<?php	
	include 'includes/dbconn.php';

	session_start();

	if(isset($_POST['valutaBtn']))
	{	
		mysqli_set_charset($conn,"utf8");
		$valuta_id = $_SESSION['vid'];
		$naziv = $_POST['naziv'];
		$tecaj = $_POST['tecaj'];
		$slika = $_POST['slika'];
		$zvuk = $_POST['zvuk'];
		$aktivno_od = date('H:i:s', strtotime($_POST['aktivno_od']));
		$aktivno_do = date('H:i:s', strtotime($_POST['aktivno_do']));
		$moderator = $_POST['moderator'];

		

		$datum = date('Y-m-d');

		$update_query = "UPDATE valuta SET naziv='$naziv', tecaj='$tecaj', slika='$slika', zvuk='$zvuk', 
						 aktivno_od='$aktivno_od', aktivno_do='$aktivno_do', moderator_id='$moderator',datum_azuriranja='$datum' WHERE valuta_id='$valuta_id'";

		if(!empty($tecaj) && is_numeric($tecaj))
		{
			mysqli_query($conn, $update_query);
			header("Location:prikaz_valuta.php");
		}
		else
		{
			echo "Tecaj je obavezno polje i mora biti broj";
		}
	}

?>