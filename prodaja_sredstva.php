<?php
	
	include 'includes/dbconn.php';
	
	
	function ProdajSredstva()
	{
		global $conn;
		$sale_query = "SELECT v.valuta_id, v.naziv FROM valuta v, sredstva s WHERE v.valuta_id = s.valuta_id AND s.korisnik_id ='".$_SESSION['uid']."'";
		$sale_result = mysqli_query($conn, $sale_query);

		
			
			while(list($valuta, $naziv) = mysqli_fetch_array($sale_result))
			{

				echo " <option value='".$valuta."'>".$naziv."</option>";


			}


	}

	function KupiSredstva()
	{
		global $conn;

		$sale_query = "SELECT valuta_id, naziv FROM valuta";
		$sale_result = mysqli_query($conn, $sale_query);

		
			
			while(list($valuta, $naziv) = mysqli_fetch_array($sale_result))
			{

				echo " <option value='".$valuta."'>".$naziv."</option>";

			}


	}


	


?>