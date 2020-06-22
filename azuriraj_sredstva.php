<?php
	
	include 'includes/dbconn.php';

	function AzurirajSredstva()
	{
		global $conn;
		$sredstva_id = mysqli_real_escape_string($conn, $_GET['sid']);
		$_SESSION['sid'] = $sredstva_id;
		$update_query = "SELECT s.iznos, v.naziv FROM sredstva s, valuta v WHERE s.sredstva_id = '$sredstva_id' AND s.valuta_id = v.valuta_id";
		$update_result = mysqli_query($conn, $update_query);

		if(mysqli_num_rows($update_result) == 1)
		{
			
			while(list($iznos, $naziv) = mysqli_fetch_array($update_result))
			{

				echo "<span>Valuta:</span><br>
					  <p>".$naziv."</p><br>
					  <span>Iznos:</span><br>
				      <input type='text' name='iznos' value=".$iznos." required/>
				      <br>
				      <input type='submit' name='azurirajBtn' value='Ažuriraj'/>
				      <a href='sredstva.php'>Odustani</a>";


			}

		}
		else{
			echo "Nema rezultata";
		}

	}

	


?>