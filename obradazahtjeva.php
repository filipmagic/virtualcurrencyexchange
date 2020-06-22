<?php

	include 'includes/dbconn.php';


	if(isset($_POST['approveBtn']))
	{
		$zahtjev = $_POST['zahtjevid'];

		$prodajna_tecaj = mysqli_query($conn, "SELECT v.tecaj FROM valuta v, zahtjev z WHERE z.prodajem_valuta_id=v.valuta_id AND z.zahtjev_id='$zahtjev'");
		$prow = mysqli_fetch_array($prodajna_tecaj);

		$kupovna_tecaj = mysqli_query($conn, "SELECT v.tecaj FROM valuta v, zahtjev z WHERE z.kupujem_valuta_id=v.valuta_id AND z.zahtjev_id='$zahtjev'");
		$krow = mysqli_fetch_array($kupovna_tecaj);

		$approve_query = "UPDATE zahtjev SET prihvacen = '1' WHERE zahtjev_id = '".$zahtjev."'";

		if(mysqli_query($conn, $approve_query))
		{
			$valuta_query = "SELECT s.valuta_id, z.iznos, z.korisnik_id FROM zahtjev z, sredstva s WHERE z.prodajem_valuta_id=s.valuta_id  AND z.zahtjev_id='$zahtjev'";
			$valuta_result = mysqli_query($conn, $valuta_query);

			if(list($valuta, $sredstva, $korisnik) = mysqli_fetch_array($valuta_result))
			{
			
				mysqli_query($conn, "UPDATE sredstva SET iznos = iznos - '$sredstva' WHERE korisnik_id='$korisnik' AND valuta_id='$valuta'");
			}


			$currency_query = "SELECT s.valuta_id, z.iznos, z.korisnik_id FROM zahtjev z, sredstva s WHERE z.kupujem_valuta_id=s.valuta_id  AND z.zahtjev_id='$zahtjev'";
			$currency_result = mysqli_query($conn, $currency_query);

		  	

				if(list($c_valuta, $c_sredstva, $c_korisnik) = mysqli_fetch_array($currency_result))
				{
					$check_query = "SELECT * FROM sredstva WHERE korisnik_id='$c_korisnik' AND valuta_id='$c_valuta'";
					$check_result = mysqli_query($conn, $check_query);

					if(mysqli_num_rows($check_result) == 1)
						{
							$novi_iznos = ($sredstva * $prow['tecaj']) / $krow['tecaj'];
							mysqli_query($conn, "UPDATE sredstva SET iznos = iznos + '$novi_iznos' WHERE korisnik_id='$c_korisnik' AND valuta_id='$c_valuta'");

						}
					else
						{
							mysqli_query($conn, "INSERT INTO sredstva(korisnik_id, valuta_id, iznos) VALUES('$c_korisnik', '$c_valuta', '$c_sredstva')");
						}
				}


		}
		else
		{
			echo "Greška";
		}
	}

	if(isset($_POST['declineBtn']))
	{
		$zahtjev = $_POST['zahtjevid'];
		$decline_query = "UPDATE zahtjev SET prihvacen = '0' WHERE zahtjev_id = '".$zahtjev."'";

		if(mysqli_query($conn, $decline_query))
		{
			header("Location:zahtjevi.php");
		}
		else
		{
			echo "Greška";
		}
	}

?>