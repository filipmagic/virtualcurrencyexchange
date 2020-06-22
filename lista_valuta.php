<?php
include 'includes/dbconn.php';
 
  function ListaValuta()
  {

     global $conn;
     mysqli_set_charset($conn,"utf8");
     $valuta_query = "SELECT valuta_id, naziv, tecaj, slika, zvuk FROM valuta";
     $result = mysqli_query($conn, $valuta_query);


     if(mysqli_num_rows($result) > 0)
     {

     	while(list($id, $naziv, $tecaj, $slika, $zvuk) = mysqli_fetch_array($result))
     	{         


     		echo "<div class='valuta' id='".$id."'>
   	  			  <img src=". $slika ." width='200' height='200'/>
   	    		  <h3>" . $naziv ."</h3>
   	  			  </div>";

     	}	
     mysqli_close($conn);
     }
    }

    if(isset($_POST['button']))
    {
    	$id = $_POST['valutaid'];

    	$query = "SELECT * FROM valuta WHERE id = '$id'";
    	$result = mysqli_query($conn, $query);

    	if($result)
    	{
    		while($row = mysqli_fetch_array($result))
    		{
    			echo $row['naziv'];
    		}
    	}
    }



  





?>