<?php
	
	include 'includes/dbconn.php';
	session_start();

	if(isset($_POST['korisnikBtn']))
	{
	   $korisnik_id = $_SESSION['kid'];
	   $korisnicko_ime = $_POST['korisnicko_ime'];
	   $ime = $_POST['ime'];
	   $prezime = $_POST['prezime'];
	   $email = $_POST['email'];
	   $lozinka = $_POST['lozinka'];
	   $tip = $_POST['tipKorisnika'];
	   $slika = $_POST['slika'];


	   if(!empty($korisnicko_ime) && !empty($lozinka) && !empty($ime) && !empty($prezime) && !empty($email))
	   {

		   	if(!empty($slika))
		   	{	
		   	  mysqli_query($conn, "UPDATE korisnik SET korisnicko_ime='$korisnicko_ime', ime='$ime', prezime='$prezime', email='$email', lozinka='$lozinka', tip_korisnika_id='$tip', slika='$slika'
	   					  WHERE korisnik_id = '$korisnik_id'");
		   	  header("Location:korisnici.php");
		   	}
		   	else
		   	{
		   		mysqli_query($conn, "UPDATE korisnik SET korisnicko_ime='$korisnicko_ime', ime='$ime', prezime='$prezime', email='$email', lozinka='$lozinka', tip_korisnika_id='$tip', slika='korisnici/default.jpg'
	   					  WHERE korisnik_id = '$korisnik_id'");
		   	    header("Location:korisnici.php");
		   	}
	   }
	   else
	   {
	   	  header("Location:azurirajkorisnika.php?kid=".$korisnik_id."");
	   }

	}


	
?>