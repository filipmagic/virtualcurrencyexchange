<?php
include 'includes/dbconn.php';
session_start();
if(isset($_POST['prodajBtn']))
{
	$iznos = $_POST['iznos'];
	$pvaluta = $_POST['pvaluta'];
	$kvaluta = $_POST['kvaluta'];
	$date = date("Y-m-d H:i:s");
	$sell_query = "INSERT INTO zahtjev (korisnik_id, iznos, prodajem_valuta_id, kupujem_valuta_id, datum_vrijeme_kreiranja, prihvacen)
				   VALUES ('{$_SESSION['uid']}', '$iznos', '$pvaluta', '$kvaluta', '$date', 2)";
	if(!empty($iznos) && is_numeric($iznos))
	{
		$iznos_query = mysqli_query($conn, "SELECT iznos FROM sredstva WHERE korisnik_id='{$_SESSION['uid']}' AND valuta_id ='$pvaluta'");

		if(mysqli_num_rows($iznos_query) == 1)
		{
		  $row = mysqli_fetch_array($iznos_query);

			if($iznos <= $row['iznos'])
			{
				mysqli_query($conn, $sell_query);
				header("Location:sredstva.php");
			}
			else
			{
				echo "Nemate dovoljno sredstva";
			}
		}
		else
		{
			echo "Nema rezultata";
		}
	}
	else
	{
		echo "Greška";
	}
}

?>