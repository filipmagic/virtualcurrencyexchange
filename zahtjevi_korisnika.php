<?php
	
	include 'includes/dbconn.php';


	function ZahtjeviKorisnika()
	{
		global $conn;

		$time = date("H:i:s");

		$user_type = "SELECT tip_korisnika_id FROM korisnik WHERE korisnik_id = '".$_SESSION['uid']."'";
		$type_result = mysqli_query($conn, $user_type);
		$type_row = mysqli_fetch_array($type_result);

		if($type_row['tip_korisnika_id'] == 1)
		{

		$urequest_query =  "SELECT 
							(SELECT naziv FROM valuta WHERE valuta_id=prodajem_valuta_id) as prodajem,
							(SELECT naziv FROM valuta WHERE valuta_id=kupujem_valuta_id) as kupujem,
							z.zahtjev_id, z.iznos, v.aktivno_od, v.aktivno_do FROM zahtjev z, valuta v WHERE z.prihvacen = 2 AND z.prodajem_valuta_id=v.valuta_id AND v.moderator_id='".$_SESSION['uid']."'";
		$urequest_result = mysqli_query($conn, $urequest_query);

			if(mysqli_num_rows($urequest_result) > 0)
			{

				echo "<section class='resourcesList'>
						<div class='heading'>
						<h4>Zahtjevi korisnika</h4>

						</div>
						<table>
						<thead>
						<tr>
							<td><p>Prodajna</p></td>
							<td><p>Kupovna</p></td>
							<td><p>Iznos</p></td>
							<td><p>Mogućnosti</p></td>
						</tr>
						</thead>
						<tbody>";

			  while(list($prodajna, $kupovna, $zahtjev_id, $iznos, $aktivno_od, $aktivno_do) = mysqli_fetch_array($urequest_result))
			  {
			  	echo "<tr>
 		      		<td><p>".$prodajna."<p></td>
 		      		<td><p>".$kupovna."</p></td>
 		      		<td><p>".$iznos."</p></td>
 		      		<td>
 		      		<div class='action' id='".$zahtjev_id."'>
 		      		";

 		      			if($time >= $aktivno_od && $time <= $aktivno_do)
 		      			{	
 		      				echo "<a class='approveBtn' id='".$zahtjev_id."'>&#10004</a>
 		      					  <a class='declineBtn' id='".$zahtjev_id."'>&#10006</a>";
 		      			}
 		      			else
 		      			{
 		      				echo "<p style='font-size:0.8rem'>Vrijeme trgovanja od: ".$aktivno_od." do: ".$aktivno_do."<p>";
 		      			}
 		      		
 		      	    "</div>
 		      		</td>
 			 	  	</tr>";
			  	
			  }
			  	echo "</tbody>
					</table>
				  </section>";

			}

		}

	}




?>