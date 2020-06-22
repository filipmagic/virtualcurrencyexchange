<?php

 function DohvatiKorisnike()
 {
 	global $conn;

 	$user_query = "SELECT t.naziv, k.korisnik_id, k.korisnicko_ime, k.ime, k.prezime, k.email, k.slika FROM korisnik k, tip_korisnika t WHERE k.tip_korisnika_id=t.tip_korisnika_id";
 	$user_result = mysqli_query($conn, $user_query);

 	if(mysqli_num_rows($user_result) > 0)
 	{
 		while(list($naziv, $korisnik_id, $korisnicko_ime, $ime, $prezime, $email, $slika) = mysqli_fetch_array($user_result))
 		{
 			echo "<tr>
 				  <td><img src='".$slika."' width='50' height='50' style='margin:5px;'/></td>
 				  <td><p>".$korisnicko_ime."</p></td>
 				  <td><p>".$ime."</p></td>
 				  <td><p>".$prezime."</p></td>
 				  <td><p>".$email."</p></td>
 				  <td><p>".$naziv."</p></td>
 				  <td><p><a href='azurirajkorisnika.php?kid=".$korisnik_id."'>Ažuriraj</a></p></td>
 				  </tr>";	

 		}
 	}

 }









?>