<?php
include 'includes/navigacija.php';
include 'azurirajtecaj.php';
if($_SESSION['tip'] != 1)
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
   <form action="azurirajvalutu.php" class="form" method="post">
     <?php AzurirajValutu(); ?>
   </form>
</body>
</html>