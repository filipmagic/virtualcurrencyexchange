<?php
		
	include 'includes/dbconn.php';	
 
    session_start();

	function AzurirajValutu()
	{
		global $conn;
		$tecaj = mysqli_real_escape_string($conn, $_GET['vid']);
		$_SESSION['valuta'] = $tecaj;
		$tecaj_query = "SELECT naziv, tecaj FROM valuta WHERE valuta_id='$tecaj'";
		$tecaj_result = mysqli_query($conn, $tecaj_query);

		if(mysqli_num_rows($tecaj_result) == 1)
		{
			
			while(list($naziv, $tecaj) = mysqli_fetch_array($tecaj_result))
			{

				echo "<span>Valuta:</span><br><p>".$naziv."</p><br>
					  <span>Tecaj:</span><br>
				      <input type='text' name='tecaj' value=".$tecaj." required/>
				      <br>
				      <input type='submit' name='tecajBtn' value='Ažuriraj'/>
				      <a href='valute.php'>Odustani</a>";

			}

		}
		else{
			echo "Nema rezultata";
		}
	}
?>