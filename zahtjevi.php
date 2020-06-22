<?php
include 'includes/navigacija.php';
include 'dohvat_zahtjeva.php';
include 'zahtjevi_korisnika.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Zahtjevi
	</title>
	<link rel="stylesheet" href="css/style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
   <?php ZahtjeviKorisnika(); ?>
	<section class="resourcesList">
	<div class="heading">
	<h4>Moji zahtjevi</h4>

	</div>
	<table>
	<thead>
	<tr>
		<td><p>Prodajna</p></td>
		<td><p>Kupovna</p></td>
		<td><p>Iznos</p></td>
		<td><p>Status</p></td>
	</tr>
	</thead>
	<tbody>
		<?php DohvatiZahtjeve(); ?>
	</tbody>
	</table>	
</section>

	

<script type="text/javascript">
    $(document).on('click', '.approveBtn', function(){
        	var zahtjevid = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: 'obradazahtjeva.php',
                data: {
                	"approveBtn": 1,
                	"zahtjevid": zahtjevid,
                },
                success: function(response) {
                    
                    
                    $('.action#'+zahtjevid).html('<div style="width:100px;height:30px;background:#2aa830;color:#ffffff;text-align:center;line-height:30px;">Odobreno</div>')




                }
            });
   });
    $(document).on('click', '.declineBtn', function(){
        	var zahtjevid = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: 'obradazahtjeva.php',
                data: {
                	"declineBtn": 1,
                	"zahtjevid": zahtjevid,
                },
                success: function(response) {
                    
                    
                    $('.action#'+zahtjevid).html('<div style="width:100px;height:30px;background:red;color:#ffffff;text-align:center;line-height:30px;">Odbijeno</div>')




                }
            });
   });
</script>
</body>
</html>