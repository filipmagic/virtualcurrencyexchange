<?php
	
	include 'includes/dbconn.php';

	if(isset($_POST['unesiValutu']))
	{
        
		mysqli_set_charset($conn,"utf8");

		$moderator = $_POST['moderator'];
		$naziv = $_POST['naziv'];
		$tecaj = $_POST['tecaj'];
		$slika = $_POST['slika'];
		$zvuk = $_POST['zvuk'];

		$aktivno_od = date('H:i:s', strtotime($_POST['aktivnoOd']));
		$aktivno_do = date('H:i:s', strtotime($_POST['aktivnoDo']));
		$datum_azuriranja = date('Y-m-d');



		$unos_query = "INSERT INTO valuta(moderator_id, naziv, tecaj, slika, zvuk, aktivno_od, aktivno_do, datum_azuriranja)
					   VALUES('$moderator', '$naziv', '$tecaj', '$slika', '$zvuk', '$aktivno_od', '$aktivno_do', '$datum_azuriranja')";

		if(!empty($moderator) && !empty($naziv) && !empty($slika) && !empty($tecaj) && !empty($aktivno_do) && !empty($aktivno_od))
		{
			mysqli_query($conn, $unos_query);
			

			echo "<script>
					alert('Uspješan unos valute');
					window.location = 'prikaz_valuta.php';
				 </script>";

		}
		else
		{
			echo "<script>
					alert('Pogreška kod unosa');
					window.location = 'unosvalute.php';
				 </script>";
			
		}

	}

?>