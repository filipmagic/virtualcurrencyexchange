<?php
  
  $server = "localhost";
  $username = "root";
  $password = "";
  $db = "example";

  $conn = mysqli_connect($server, $username, $password, $db);
  date_default_timezone_set("Europe/Zagreb");
  mysqli_set_charset($conn, "utf-8");
  if(!$conn)
  {
  	die("Pogreška kod povezivanja: " . mysqli_connect_error());
  }

 
 

?>