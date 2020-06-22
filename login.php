<?php
	
	include 'includes/dbconn.php';

	session_start();

	if(isset($_POST['loginbtn']))
	{
		$uname = $_POST['username'];
		$upass = $_POST['userpassword'];

		$uname = mysqli_real_escape_string($conn, $uname);
		$upass= mysqli_real_escape_string($conn, $upass);


		$login_query = "SELECT * FROM korisnik WHERE korisnicko_ime = '$uname' AND lozinka = '".$upass."'";
		$login_result = mysqli_query($conn, $login_query);


		if(mysqli_num_rows($login_result) == 1)
		{

					$row = mysqli_fetch_array($login_result);
					$_SESSION['prijavljen'] = true;
					$_SESSION['uid'] = $row['korisnik_id'];
					$_SESSION['tip'] = $row['tip_korisnika_id'];
					$_SESSION['username'] = $uname;
					
					header("Location:index.php");
			

		}
		else
		{
				if(empty($uname) && !empty($upass))
				{
					header("Location:prijava.php");

				}
				else if (empty($upass) && !empty($uname)) {
					header("Location:prijava.php");
				}
				else if(empty($uname) && empty($upass))
				{
					header("Location:prijava.php");
				}
			
		}

	}




?>