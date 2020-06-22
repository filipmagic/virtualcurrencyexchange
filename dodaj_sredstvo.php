<?php
 include 'includes/dbconn.php';
 include 'includes/navigacija.php';
 include 'includes/check_session.php';
 include 'dodajsredstva.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Dodaj sredstva
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
   <form action="dodajsredstvo.php" class="form" method="post">
    <span>Valuta:</span>
   	<select name="valuta">
	 <?php DodajSredstva(); ?>
	</select>
	<span>Iznos:</span>
	<input type="text" name="iznos" />
	<input type="submit" name="dodajBtn" value="Dodaj sredstva" />
	<a href="sredstva.php">Odustani</a>
   </form>
</body>
</html>