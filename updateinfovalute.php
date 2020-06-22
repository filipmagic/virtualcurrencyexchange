<?php

	include 'includes/dbconn.php';

	function UpdateValuta()
	{
		global $conn;
		mysqli_set_charset($conn,"utf8");
		$valuta_id = mysqli_real_escape_string($conn, $_GET['vid']);
		$_SESSION['vid'] = $valuta_id;
		$updatevaluta_query = "SELECT * FROM valuta WHERE valuta_id='$valuta_id'";
		$updatevaluta_result = mysqli_query($conn, $updatevaluta_query);

		if(mysqli_num_rows($updatevaluta_result) == 1)
		{
			$row = mysqli_fetch_array($updatevaluta_result);

			echo "<span>Naziv:</span><br>
				  <input type='text' name='naziv' value='".$row['naziv']."' required/><br>
				  <span>Tečaj:</span><br>
				  <input type='text' name='tecaj' value='".$row['tecaj']."' required/><br>
				  <span>Slika:</span><br>
				  <input type='text' name='slika' value='".$row['slika']."' required/><br>
				  <span>Zvuk:</span><br>
				  <input type='text' name='zvuk' value='".$row['zvuk']."' /><br>
				  <span>Aktivno od:</span><br>
				  <input type='text' name='aktivno_od' value='".$row['aktivno_od']."' required/><br>
				  <span>Aktivno do:</span><br>
				  <input type='text' name='aktivno_do' value='".$row['aktivno_do']."' required/><br>
				  <span>Moderator:</span><br>
				  <select name='moderator'>";
				   $moderator_query = "SELECT korisnik_id, korisnicko_ime FROM korisnik WHERE tip_korisnika_id = 1";
				   $moderator_result = mysqli_query($conn, $moderator_query);

				   while(list($moderator_id, $korisnicko_ime) = mysqli_fetch_array($moderator_result))
				   {
						echo "<option value='".$moderator_id."'>".$korisnicko_ime."</option>";			   	
				   }
				  echo "</select><br>
				  <input type='submit' name='valutaBtn' value='Ažuriraj'/>
				  <a href='prikaz_valuta.php'>Odustani</a>";
		}

	}

?>