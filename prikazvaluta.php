<?php
	
	include 'includes/dbconn.php';


	function PrikazValuta()
	{

	global $conn;

	$valute_query = "SELECT v.valuta_id, k.korisnicko_ime, v.naziv, v.tecaj, v.aktivno_od , v.aktivno_do, v.datum_azuriranja FROM korisnik k, valuta v WHERE k.korisnik_id = v.moderator_id";
	$valuta_result = mysqli_query($conn, $valute_query);

	if(mysqli_num_rows($valuta_result) > 0)
	{
		while(list($vid, $moderator, $naziv, $tecaj, $aktivno_od, $aktivno_do, $datum_azuriranja) = mysqli_fetch_array($valuta_result))
		{

			echo "<tr>
	 		      <td><p>".$naziv."<p></td>
	 		      <td><p>".$tecaj."</p></td>
	 		      <td><p>".$aktivno_od."</p></td>
	 		      <td><p>".$aktivno_do."</p></td>
	 		      <td><p>".date('d.m.Y', strtotime($datum_azuriranja))."</p></td>
	 		      <td><p>".$moderator."</p></td>
	 		      <td><p class='updateBtn'><a href='updatevaluta.php?vid=".$vid."'>Ažuriraj</a></p></td>
	 			  </tr>";

		}

	}
	else
		{
			echo "<tr><td>Nema rezultata</td></tr>";
		}

}

?>