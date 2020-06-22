<?php
include 'includes/navigacija.php';
include 'updateinfovalute.php';
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
		Ažuriraj valutu
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
   <form action="update_valuta.php" class="form" method="post">
      <?php UpdateValuta(); ?>
   </form>
</body>
</html>