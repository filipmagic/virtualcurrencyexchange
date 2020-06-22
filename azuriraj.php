<?php
include 'includes/navigacija.php';
include 'azuriraj_sredstva.php';
include 'includes/check_session.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Ažuriraj sredstva
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
   <form action="azurirajsredstvo.php" class="form" method="post">
     <?php AzurirajSredstva(); ?>
   </form>
</body>
</html>