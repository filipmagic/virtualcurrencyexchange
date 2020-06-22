<?php
include 'includes/dbconn.php';


function Navigacija()
	{
		global $conn;

		mysqli_set_charset($conn,"utf8");

		if(isset($_SESSION['prijavljen']))
		{	
			$ime = $_SESSION['username'];

			$user_query = "SELECT tip_korisnika_id FROM korisnik WHERE korisnicko_ime = '$ime'";
			$result = mysqli_query($conn, $user_query);

			if(mysqli_num_rows($result) == 1)
			{
				if($row = mysqli_fetch_array($result))
				{
					$tip = $row['tip_korisnika_id'];

					
					switch ($tip) {
									  case 0:
									    echo "<div class='sidebar'>
									    	  <ul>
									    	  <li><a href='index.php'>Početna</a></li>
									    	  <li><a href='prikaz_valuta.php'>Valute</a></li>
											  <li><a href='sredstva.php'>Sredstva</a></li>
											  <li><a href='korisnici.php'>Korisnici</a></li>
											  <li><a href='zahtjevi.php'>Zahtjevi</a></li>
											  <li><a href='ukupna_prodaja.php'>Ukupna prodaja</a></li>
										      </ul>
										      </div>";
									    break;
									  case 1:
									    echo "<div class='sidebar'>
									    	  <ul>
									    	  <li><a href='index.php'>Početna</a></li>
											  <li><a href='sredstva.php'>Sredstva</a></li>
										      <li><a href='zahtjevi.php'>Zahtjevi</a></li>
										      <li><a href='valute.php'>Valute</a></li>
										      </ul>
										      </div>";
									    break;
									  case 2:
									    echo "<div class='sidebar'>
									    	  <ul>
									    	  <li><a href='index.php'>Početna</a></li>
											  <li><a href='sredstva.php'>Sredstva</a></li>
										      <li><a href='zahtjevi.php'>Zahtjevi</a></li>
										      </ul>
										      </div>
										      ";
									    break;
									  default:
									   		echo "<div class='sidebar' style='display:none;'></div>";
									}
				}

			}
			else
			{
				echo "Nema rezultata";
			}


		}


	}

	function NavigacijaTop()
	{

		if(isset($_SESSION) && isset($_SESSION['prijavljen']))
		{

				echo "<li><a href='o_autoru.php'>Autor</a></li>
					  <li><a href='odjava.php'>Odjava</a></li>";

		}
		else
		{
				echo "<li><a href='o_autoru.php'>Autor</a></li>
					  <li><a href='prijava.php'>Prijava</a></li>";
		}			

	}



?>