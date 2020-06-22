<?php
include 'includes/navigacija.php';
include 'azuriraj_korisnika.php';
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
		Ažuriraj korisnika
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
   <form action="updateuser.php" class="form" method="post">
     <?php AzurirajKorisnika(); ?>
   </form>
</body>
</html>