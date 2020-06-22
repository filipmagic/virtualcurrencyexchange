<?php
include 'includes/navigacija.php';
include 'prodaja_sredstva.php';
include 'includes/check_session.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Prodaja sredstva
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
   
   <form action="prodajsredstvo.php" class="form" method="post">
      <span>Prodaj:</span><br>
      <select name='pvaluta'>
          <?php ProdajSredstva(); ?>        
      </select><br>
      <span>Iznos:</span><br>
      <input type="text" name="iznos" required/><br>
      <span>Kupi:</span><br>
      <select name='kvaluta'>
          <?php KupiSredstva(); ?>        
      </select><br>
      <input type="submit" name="prodajBtn" value="Pošalji zahtjev" />
      <a href="sredstva.php">Odustani</a>
     
   </form>
</body>
</html>