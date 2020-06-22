<?php
include 'includes/navigacija.php';
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Sve valute
	</title>
	<link rel="stylesheet" href="css/style.css" />
	<meta charset="UTF-8"/>
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

<section class="authorDetails">
	<div class="left">
		<div class="authorImage">
			<img src="images/autor.jpg" width="300" height="400" />
		</div>
	</div>
	<div class="right">
		<div class="authorInfo">
			<p><span>Ime:</span> Filip</p>
			<p><span>Prezime:</span>Magić</p>
			<p><span>Broj indeksa:</span>46272/17-R</p>
			<p><span>E-mail:</span> fmagic@foi.hr</p>
			<p><span>Centar:</span> Varaždin</p>
			<p><span>Godina:</span> 2019/2020</p>
		</div>
	</div>
	
</section>

</body>
</html>