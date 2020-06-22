<?php 
	
	include 'includes/dbconn.php';

	function ProdaneValute()
	{

		global $conn;


		$valute = "SELECT v.naziv, SUM(z.iznos) as piznos FROM valuta v, zahtjev z WHERE z.prihvacen = 1 AND v.valuta_id=z.prodajem_valuta_id  GROUP BY v.valuta_id";
		$valute_result = mysqli_query($conn, $valute);

		while(list($naziv, $iznos) = mysqli_fetch_array($valute_result))
		{

			echo "<tr>
					<td><p>".$naziv."</p></td>
					<td><p>".$iznos."</p></td>
				  </tr>";
		}

	}

	function FiltrirajProdaneValute()
	{
			global $conn;

			$moderator = $_POST['moderator'];
			$datum_od = $_POST['datum_od'];
			$datum_do = $_POST['datum_do'];
			$vrijeme_od = $_POST['vrijeme_od'];
			$vrijeme_do = $_POST['vrijeme_do'];
			


				if(empty($datum_od) || empty($datum_do) || empty($vrijeme_od) || empty($vrijeme_do))
				{

					$filter_query = mysqli_query($conn, "SELECT v.naziv, SUM(z.iznos) as piznos FROM valuta v, zahtjev z 
									WHERE z.prihvacen = 1 AND v.valuta_id=z.prodajem_valuta_id AND v.moderator_id='$moderator' GROUP BY v.valuta_id");

					if(mysqli_num_rows($filter_query) > 0)
					{

					 while(list($naziv, $iznos) = mysqli_fetch_array($filter_query))
					 {		
						echo "<tr>
								<td><p>".$naziv."</p></td>
								<td><p>".$iznos."</p></td>
							  </tr>";
					 }
					}
					else
					{
						echo "<tr>
								<td><p>Moderator još nije odobrio ni jedan zahtjev</p></td>
							  </tr>";
					}
					
				}
				else
				{
					   
    			 $datum1 = date("Y-m-d", strtotime($datum_od)) . ' ' .date("H:i:s", strtotime($vrijeme_od));
    			 $datum2 = date("Y-m-d", strtotime($datum_do)) . ' ' .date("H:i:s", strtotime($vrijeme_do));

    			 $filter_query = mysqli_query($conn, "SELECT v.naziv, SUM(z.iznos) as piznos FROM valuta v, zahtjev z 
									WHERE z.prihvacen = 1 AND v.valuta_id=z.prodajem_valuta_id AND v.moderator_id='$moderator' AND
									datum_vrijeme_kreiranja BETWEEN '$datum1' AND '$datum2' GROUP BY v.valuta_id");

					if(mysqli_num_rows($filter_query) > 0)
					{

					 while(list($naziv, $iznos) = mysqli_fetch_array($filter_query))
					 {		
						echo "<tr>
								<td><p>".$naziv."</p></td>
								<td><p>".$iznos."</p></td>
							  </tr>";
					 }
					}
					else
					{
						echo "<tr>
								<td><p>Moderator još nije odobrio ni jedan zahtjev</p></td>
							  </tr>";
					}
         


				}


	}



?>