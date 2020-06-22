<?php

	include 'includes/dbconn.php';

	function AzurirajKorisnika()
	{
		global $conn;

		$korisnik_id = mysqli_real_escape_string($conn, $_GET['kid']);
		$_SESSION['kid'] = $korisnik_id;
		$updateuser_query = "SELECT * FROM korisnik WHERE korisnik_id='$korisnik_id'";
		$updateuser_result = mysqli_query($conn, $updateuser_query);

		if(mysqli_num_rows($updateuser_result) == 1)
		{
			$row = mysqli_fetch_array($updateuser_result);

			echo "<span>Korisničko ime:</span><br>
				  <input type='text' name='korisnicko_ime' value='".$row['korisnicko_ime']."' required/><br>
				  <span>Ime:</span><br>
				  <input type='text' name='ime' value='".$row['ime']."' required/><br>
				  <span>Prezime:</span><br>
				  <input type='text' name='prezime' value='".$row['prezime']."' required/><br>
				  <span>E-mail:</span><br>
				  <input type='email' name='email' value='".$row['email']."' required/><br>
				  <span>Lozinka:</span><br>
				  <input type='password' name='lozinka' value='".$row['lozinka']."' required/><br>
				  <span>Tip korisnika:</span><br>
				  <select name='tipKorisnika'>";
				   $tip_query = "SELECT tip_korisnika_id, naziv FROM tip_korisnika";
				   $tip_result = mysqli_query($conn, $tip_query);

				   while(list($tip_id, $naziv) = mysqli_fetch_array($tip_result))
				   {
				   		if($tip_id == $row['tip_korisnika_id'])
				   		{
						echo "<option value='".$tip_id."' selected>".$naziv."</option>";
						}
						else
						{
						  echo "<option value='".$tip_id."'>".$naziv."</option>";
						}			   	
				   }
				  echo "</select><br>
				  <span>Slika:</span><br>
				  <input type='text' name='slika' value='".$row['slika']."' required/><br>
				  <input type='submit' name='korisnikBtn' value='Ažuriraj'/>
				  <a href='korisnici.php'>Odustani</a>";
		}

	}

?>