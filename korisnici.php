<?php
include 'includes/navigacija.php';
include 'includes/check_session.php';
include 'dohvat_korisnika.php';

if($_SESSION['tip'] != 0)
{
	header("Location:index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Korisnici
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
	<h4>Korisnici</h4>

	</div>
	<table>
	<thead>
	<tr>
		<td><p>Slika</p></td>
		<td><p>Korisničko ime</p></td>
		<td><p>Ime</p></td>
		<td><p>Prezime</p></td>
		<td><p>E-mail</p></td>
		<td><p>Tip korisnika</p></td>
		<td><p>Mogućnosti</p></td>
	</tr>
	</thead>
	<tbody>
		<?php DohvatiKorisnike(); ?>
	</tbody>
	</table>

	<div class="addBtn"><a href="novi_korisnik.php">Novi korisnik</a></div>
</section>
</body>
</html>