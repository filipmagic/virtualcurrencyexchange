<?php
include 'includes/navigacija.php';
include 'azuriraj_tecaj.php';

if($_SESSION['tip'] != 1)
{
	header("Location:index.php");
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Valute
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
		<td><p>Status</p></td>
	</tr>
	</thead>
	<tbody>
		<?php PopisValuta(); ?>
	</tbody>
	</table>
</section>

</body>
</html>