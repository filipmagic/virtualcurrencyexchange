<?php
include 'includes/dbconn.php';


function DodajSredstva()
	{
		global $conn;
		$dodaj_query = "SELECT valuta_id, naziv FROM valuta";
		$dodaj_result = mysqli_query($conn, $dodaj_query);

		
			
			while(list($valuta, $naziv) = mysqli_fetch_array($dodaj_result))
			{

				echo "<option value='".$valuta."'>".$naziv."</option>";


			}


	}

?>