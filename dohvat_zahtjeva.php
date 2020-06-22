<?php
	
	include 'includes/dbconn.php';

	session_start();

	function DohvatiZahtjeve()
	{
		global $conn;

		$request_query = "SELECT 
							(SELECT naziv FROM valuta WHERE valuta_id=prodajem_valuta_id) as prodajem,
							(SELECT naziv FROM valuta WHERE valuta_id=kupujem_valuta_id) as kupujem,
							iznos as prodajni_iznos, prihvacen FROM zahtjev WHERE korisnik_id='".$_SESSION['uid']."'";
		$request_result = mysqli_query($conn, $request_query);

		if(mysqli_num_rows($request_result) > 0)
		{

		  while(list($prodajna, $kupovna, $iznos, $status) = mysqli_fetch_array($request_result))
		  {		
			echo "<tr>
 		      		<td><p>".$prodajna."<p></td>
 		      		<td><p>".$kupovna."</p></td>
 		      		<td><p>".$iznos."</p></td>
 		      		<td>";
 		      		if($status == 0)
 		      		{
 		      			echo "<div class='odbijenZahtjev'><p>Odbijen</p></div>";
 		      		}
 		      		else if($status == 1)
 		      		{
 		      			echo "<div class='prihvacenZahtjev'><p>Prihvaćen</p></div>";
 		      		}
 		      		else
 		      		{
 		      			echo "<div class='onholdZahtjev'><p>Na čekanju</p></div>";
 		      		}

 		      		echo "</div></td>
 			 	  </tr>";
 		  }
		}
		else
		{
			echo "<tr><td><p>Još niste poslali nijedan zahtjev za prodaju/kupnju valute</p></td></tr>";
		}
	}
	



?>