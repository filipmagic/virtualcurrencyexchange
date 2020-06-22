<?php
	
include 'includes/dbconn.php';
	
session_start();

	if(isset($_POST['dodajBtn']))
	{
	   $korisnik_id = $_SESSION['uid'];
	   $valuta = $_POST['valuta'];
	   $iznos = $_POST['iznos'];

	   $select_query = "SELECT sredstva_id, valuta_id FROM sredstva WHERE korisnik_id='$korisnik_id' AND valuta_id='$valuta'";
	   $select_result = mysqli_query($conn, $select_query);

	   $row = mysqli_fetch_array($select_result);

	   if(mysqli_num_rows($select_result) == 0)
	   {

		   	if(!empty($iznos) && !empty($valuta))

		   	{
		   	 mysqli_query($conn, "INSERT INTO sredstva(korisnik_id, valuta_id, iznos)
		   					 	  VALUES('$korisnik_id', '$valuta', '$iznos')");

		   	 header("Location:sredstva.php");

		   }

	   }

	   else
	   {

	   	if(!empty($iznos) && !empty($valuta))
		   	{
		   	 mysqli_query($conn, "UPDATE sredstva SET iznos=iznos + '$iznos' WHERE sredstva_id='".$row['sredstva_id']."'");

		   	 header("Location:sredstva.php");

		   }

	   }

	  }



?>