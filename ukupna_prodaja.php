<?php
include 'includes/navigacija.php';
include 'prodane_valute.php';
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
		Ukupna prodaja
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
	<h4>Iznos prodaje</h4>

	</div>
	<form class="filterform" method="post" action="">
	<span>Moderator</span>
	<select name="moderator">
	<?php
		$moderator = "SELECT korisnik_id, korisnicko_ime FROM korisnik WHERE tip_korisnika_id = 1";
		$moderator_result = mysqli_query($conn, $moderator);

		while(list($moderator_id, $korime) = mysqli_fetch_array($moderator_result))
		{
			echo "<option value='".$moderator_id."'>".$korime."</option>";
		}
	?>
	</select>
	  <span>Datum od</span>
		<input type="text" name="datum_od" />
	  <span>Datum do</span>
		<input type="text" name="datum_do" />
	  <span>Vrijeme od</span>
		<input type="text" name="vrijeme_od" />
	  <span>Vrijeme do</span>
		<input type="text" name="vrijeme_do" /><br>
	  <input type="submit" name="filtrirajBtn" value="Filtriraj" />
	  <input type="submit" name="resetBtn" value="Resetiraj filtere" />
	</form>
	<table style="width:30vw;">
	<thead>
	<tr>
		<td><p>Naziv valute</p></td>
		<td><p>Ukupno prodano</p></td>
	</tr>
	</thead>
	<tbody>
		<?php
		 if(isset($_POST['filtrirajBtn']))
		 {
		 	FiltrirajProdaneValute();
		 }
		 else if(isset($_POST['resetBtn']))
		 {
		 	ProdaneValute();
		 }
		 else
		 {
			ProdaneValute();
		 }
		 
		?>
	</tbody>
	</table>
</section>

</body>
</html>