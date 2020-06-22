<?php
include 'includes/navigacija.php';
include 'prikazvaluta.php';
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

<section class="resourcesList">
	<div class="heading">
	<h4>Valute</h4>

	</div>
	<table>
	<thead>
	<tr>
		<td><p>Naziv</p></td>
		<td><p>Tečaj</p></td>
		<td><p>Aktivno od</p></td>
		<td><p>Aktivno do</p></td>
		<td><p>Datum ažuriranja</p></td>
		<td><p>Moderator</p></td>
		<td><p>Ažuriraj</p></td>
	</tr>
	</thead>
	<tbody>
		<?php PrikazValuta(); ?>
	</tbody>
	</table>
	<div class="addBtn"><a href="unosvalute.php">Dodaj</a></div>
</section>

</body>
</html>