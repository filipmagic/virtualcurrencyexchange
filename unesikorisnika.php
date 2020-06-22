<?php
	
include 'includes/dbconn.php';
	

	if(isset($_POST['unesiBtn']))
	{
	   $korisnik_id = $_SESSION['kid'];
	   $korisnicko_ime = $_POST['korisnickoIme'];
	   $ime = $_POST['imeKorisnika'];
	   $prezime = $_POST['prezimeKorisnika'];
	   $email = $_POST['email'];
	   $lozinka = $_POST['lozinka'];
	   $tip = $_POST['tipKorisnika'];
	   $slika = $_POST['slika'];

	 
	   if(!empty($korisnicko_ime) && !empty($lozinka) && !empty($ime) && !empty($prezime) && !empty($email))
	   {

		   	if(!empty($slika))
		   	{	
		   	  mysqli_query($conn, "INSERT INTO korisnik(tip_korisnika_id, korisnicko_ime, lozinka, ime, prezime, email, slika)
	   					   VALUES('$tip','$korisnicko_ime', '$lozinka', '$ime', '$prezime', '$email', '$slika')");
		   	  header("Location:korisnici.php");
		   	}
		   	else
		   	{
		   		mysqli_query($conn, "INSERT INTO korisnik(tip_korisnika_id, korisnicko_ime, lozinka, ime, prezime, email, slika)
	   					   VALUES('$tip','$korisnicko_ime', '$lozinka', '$ime', '$prezime', '$email', 'korisnici/default.jpg')");
		   	    header("Location:korisnici.php");
		   	}
	   }
	   else
	   {
	   	  header("Location:novi_korisnik.php");
	   }

	}

?>