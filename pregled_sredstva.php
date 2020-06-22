<?php
include 'includes/dbconn.php';


 function DohvatiSredstva()
 {
 	global $conn;

 	$korisnik_id = $_SESSION['uid'];

 	$sredstva_query = "SELECT s.sredstva_id, v.naziv, s.iznos FROM valuta v, sredstva s WHERE s.korisnik_id = '$korisnik_id' AND v.valuta_id = s.valuta_id";
 	$sredstva_result = mysqli_query($conn, $sredstva_query);

 	if(mysqli_num_rows($sredstva_result) > 0)
 	{
 		while(list($sid, $naziv, $iznos) = mysqli_fetch_array($sredstva_result))
 		{
 		echo "<tr>
 		      <td><p>".$naziv."<p></td>
 		      <td><p>".round($iznos,2)."</p></td>
 		      <td><p class='updateBtn'><a href='azuriraj.php?sid=".$sid."'>Ažuriraj</a></p></td>
 			  </tr>";
 		}

 	}
 	else
 	{

 		echo "<tr>
 				<td></td>
 				<td style='text-align:center'>Na računu nemate sredstva</td>
 			 </tr>";
 	}

 }




?>