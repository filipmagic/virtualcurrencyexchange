<?php
		
	include 'includes/dbconn.php';	
	session_start();

	function PopisValuta()
	{

			global $conn;

			$valute_query = "SELECT valuta_id, naziv, tecaj, aktivno_od, aktivno_do, datum_azuriranja FROM valuta WHERE moderator_id = '".$_SESSION['uid']."'";
			$valute_result = mysqli_query($conn, $valute_query);

			if(mysqli_num_rows($valute_result) > 0)
			{
				while(list($valuta_id, $naziv, $tecaj, $aktivno_od, $aktivno_do, $datum_azuriranja) = mysqli_fetch_array($valute_result))
				{
					$datum = strtotime($datum_azuriranja);
					
					echo "<tr>
							<td><p>".$naziv."</p></td>
							<td><p>".$tecaj."</p></td>
							<td><p>".$aktivno_od."</p></td>
							<td><p>".$aktivno_do."</p></td>
						  ";

						if(date('d.m.Y', $datum) < date('d.m.Y'))
						{
							echo "<td>
									<p><a href='azuriraj_valutu.php?vid=".$valuta_id."'>Ažuriraj</a></p>
								  </td>";
						}
						else
						{
							echo "<td>
									<p>Danas ažurirano</p>
								  </td>";
						}
					echo "</tr>";

				}
			}
			else
			{

			}

	}

?>