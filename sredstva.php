<?php
include 'includes/navigacija.php';
include 'pregled_sredstva.php';
include 'includes/check_session.php';


?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Sredstva
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
<section class="resourcesList">
	<div class="heading">
	<h4>Raspoloživa sredstva</h4>

	</div>
	<table>
	<thead>
	<tr>
		<td><p>Valuta</p></td>
		<td><p>Iznos</p></td>
		<td><p>Mogućnosti</p></td>
	</tr>
	</thead>
	<tbody>
		<?php DohvatiSredstva(); ?>
	</tbody>
	</table>
	<div class="addBtn"><a href="dodaj_sredstvo.php">Dodaj</a></div>
	<div class="addBtn"><a href="prodaja.php">Prodaj</a></div>
</section>

</body>
</html>