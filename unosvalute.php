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
		Nova valuta
	</title>
	<link rel="stylesheet" href="css/style.css" />
	<meta charset="UTF-8" />
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
   <form action="unos_valute.php" class="form" method="post">
	 
	 <span>Naziv valute:</span>  
	 <input type="text" name="naziv" required/> 
	 <span>Tečaj:</span>  
	 <input type="text" name="tecaj" required/> 
	 <span>Slika:</span>  
	 <input type="text" name="slika" required/> 
	 <span>Zvuk:</span>  
	 <input type="text" name="zvuk" />
	 <span>Aktivno od:</span>  
	 <input type="text" name="aktivnoOd" required/>
	 <span>Aktivno do:</span>  
	 <input type="text" name="aktivnoDo" required/>
	 <span>Moderator:</span>
	 <select name="moderator">
	   <?php
	   $moderator_query = "SELECT korisnik_id, korisnicko_ime FROM korisnik WHERE tip_korisnika_id = 1";
	   $moderator_result = mysqli_query($conn, $moderator_query);

				   while(list($korisnik_id, $korisnicko_ime) = mysqli_fetch_array($moderator_result))
				   {
						echo "<option value='".$korisnik_id."'>".$korisnicko_ime."</option>";			   	
				   }
	   ?>
	 </select>
	 <input type="submit" name="unesiValutu" value="Unesi valutu"/>
	 <a href="prikaz_valuta.php">Odustani</a>
   </form>
</body>
</html>