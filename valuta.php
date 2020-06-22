<?php

include 'includes/dbconn.php';
 
    mysqli_set_charset($conn,"utf8");

    if(isset($_POST['tekst']))
    {
      $id = $_POST['valutaid'];

      $query = "SELECT naziv, tecaj, slika, zvuk FROM valuta WHERE valuta_id = '$id'";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) == 1)
      {
        while(list($naziv, $tecaj, $slika, $zvuk) = mysqli_fetch_array($result))
        {
        

           echo "<div class='closeBtn'><span>&#10006;</span></div>
                  <div class='image'>
                   <img src=".$slika." width='200' height='200' />
                  </div>
                  <div class='audio'>
                   <h3>Himna:</h3><br>
                   <audio controls>
                  <source src='".$zvuk."' type='audio/ogg'>
                Your browser does not support the audio element.
                </audio>
                  </div><br><br>
                  <div class='valutaInfo'>
                    <h3>Naziv valute:</h3><br>
                    <p>".$naziv."</p><br><br>
                    <h3>Trenutni tecaj:</h3><br>
                    <p>".$tecaj."</p>
                  </div>
                 ";
              
        }
      }
    }




?>