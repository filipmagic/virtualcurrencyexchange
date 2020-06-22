<?php
 include 'includes/dbconn.php';
 include 'includes/navigacija.php';
 include 'includes/check_session.php';
 if($_SESSION['tip'] != 0)
{
	header("Location:index.php");
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Novi korisnik
	</title>
	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
	<header>
   	 <nav>
   	 	<ul>
   	 	    <?php NavigacijaTop(); ?>
   	 	</ul>
   	 </nav>
   </header>
   <?php Navigacija(); ?>
   <form action="unesikorisnika.php" class="form" method="post">
	 
	 <span>Korisničko ime:</span>  
	 <input type="text" name="korisnickoIme" required/> 
	 <span>Ime:</span>  
	 <input type="text" name="imeKorisnika" required/> 
	 <span>Prezime:</span>  
	 <input type="text" name="prezimeKorisnika" required/> 
	 <span>Lozinka:</span>  
	 <input type="password" name="lozinka" required/>
	 <span>E-mail:</span>  
	 <input type="email" name="email" required/>
	 <span>Tip korisnika:</span>
	 <select name="tipKorisnika">
	   <?php
	   $tip_query = "SELECT tip_korisnika_id, naziv FROM tip_korisnika";
	   $tip_result = mysqli_query($conn, $tip_query);

				   while(list($tip_id, $naziv) = mysqli_fetch_array($tip_result))
				   {
						echo "<option value='".$tip_id."'>".$naziv."</option>";			   	
				   }
	   ?>
	 </select>
	 <span>Slika:</span>  
	 <input type="text" name="slika" />
	 <input type="submit" name="unesiBtn" value="Unesi korisnika"/>
	 <a href="korisnici.php">Odustani</a>
   </form>
</body>
</html>